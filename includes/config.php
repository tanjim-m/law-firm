<?php
define('SITE_URL', 'http://localhost:8080');
define('ADMIN_URL', SITE_URL . '/admin');
define('DATA_DIR', __DIR__ . '/../data/');
define('UPLOAD_DIR', __DIR__ . '/../assets/images/');

if (!is_dir(DATA_DIR)) mkdir(DATA_DIR, 0755, true);

session_start();

class JSONStore {
    private string $file;
    private array $data = [];
    private int $nextId = 1;

    public function __construct(string $name) {
        $this->file = DATA_DIR . $name . '.json';
        if (file_exists($this->file)) {
            $this->data = json_decode(file_get_contents($this->file), true) ?: [];
        }
        if (!isset($this->data['data'])) $this->data['data'] = [];
        if (!isset($this->data['nextId'])) {
            $max = 0;
            foreach ($this->data['data'] as $row) if (($row['id'] ?? 0) > $max) $max = $row['id'];
            $this->data['nextId'] = $max + 1;
        }
        $this->nextId = $this->data['nextId'];
    }

    public function insert(array $row): int {
        $row['id'] = $this->nextId++;
        if (!isset($row['created_at'])) $row['created_at'] = date('Y-m-d H:i:s');
        $this->data['data'][] = $row;
        $this->data['nextId'] = $this->nextId;
        $this->save();
        return $row['id'];
    }

    public function update(int|string $id, array $row): void {
        foreach ($this->data['data'] as &$r) {
            if (($r['id'] ?? 0) == $id) {
                $row['id'] = $id;
                if (!isset($row['created_at'])) $row['created_at'] = $r['created_at'] ?? date('Y-m-d H:i:s');
                $r = $row;
                $this->save();
                return;
            }
        }
    }

    public function delete(int|string $id): void {
        $this->data['data'] = array_values(array_filter($this->data['data'], fn($r) => ($r['id'] ?? 0) != $id));
        $this->save();
    }

    public function find(int|string $id): ?array {
        foreach ($this->data['data'] as $r) if (($r['id'] ?? null) == $id) return $r;
        return null;
    }

    public function all(string $orderKey = 'id', string $order = 'ASC'): array {
        $data = $this->data['data'];
        usort($data, fn($a, $b) => $order === 'DESC' ? ($b[$orderKey] ?? '') <=> ($a[$orderKey] ?? '') : ($a[$orderKey] ?? '') <=> ($b[$orderKey] ?? ''));
        return $data;
    }

    public function where(string $key, $value): array {
        return array_values(array_filter($this->data['data'], fn($r) => ($r[$key] ?? null) === $value));
    }

    public function count(): int { return count($this->data['data']); }

    public function countWhere(string $key, $value): int {
        return count(array_filter($this->data['data'], fn($r) => ($r[$key] ?? null) === $value));
    }

    public function exec(string $sql, array $params = []): array {
        // Simulated query support for simple SELECT COUNT(*), SELECT * with WHERE
        $sql = strtolower(trim($sql));
        if (preg_match('/select count\(\*\) from (\w+)/', $sql, $m)) {
            return [['count' => $this->count()]];
        }
        if (preg_match('/select count\(\*\) from (\w+) where (\w+)\s*=\s*\?/', $sql, $m)) {
            return [['count' => $this->countWhere($m[2], $params[0] ?? '')]];
        }
        if (preg_match('/select \* from (\w+) order by (\w+) desc limit (\d+)/', $sql, $m)) {
            $all = $this->all($m[2], 'DESC');
            return array_slice($all, 0, (int)$m[3]);
        }
        if (preg_match('/select \* from (\w+) order by (\w+) desc/', $sql, $m)) {
            return $this->all($m[2], 'DESC');
        }
        return $this->all();
    }

    private function save(): void {
        file_put_contents($this->file, json_encode($this->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);
    }
}

function store(string $name): JSONStore {
    static $stores = [];
    return $stores[$name] ??= new JSONStore($name);
}

function getSetting(string $key, string $default = ''): string {
    $s = store('settings');
    $row = $s->find($key);
    return $row ? ($row['value'] ?? $default) : $default;
}

function saveSetting(string $key, string $value): void {
    $s = store('settings');
    $existing = $s->find($key);
    if ($existing) {
        $s->update($key, ['id' => $key, 'value' => $value]);
    } else {
        $s->insert(['id' => $key, 'value' => $value]);
    }
}

function getSiteName(): string { return getSetting('firm_name', 'Taj Law Firm'); }
function getTagline(): string { return getSetting('tagline', 'Justice Served with Integrity'); }

function isAdminLoggedIn(): bool {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

function requireAdmin(): void {
    if (!isAdminLoggedIn()) {
        header('Location: ' . ADMIN_URL . '/login.php');
        exit;
    }
}

function sanitize(string $value): string {
    return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
}

function redirect(string $url): void {
    header("Location: $url");
    exit;
}

function displayAlert(string $message, string $type = 'success'): string {
    $bg = ['success' => '#065f46', 'error' => '#991b1b', 'warning' => '#92400e', 'info' => '#1e40af'][$type] ?? '#065f46';
    return "<div style='background:$bg;color:#fff;padding:12px 20px;border-radius:6px;margin-bottom:16px;'>" . sanitize($message) . "</div>";
}
