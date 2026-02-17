<?php
if ($argc < 3) {
    echo "Uso: php scripts/reset_password.php email new_password\n";
    exit(1);
}

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$email = $argv[1];
$new = $argv[2];

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$user = User::where('email', $email)->first();
if (!$user) {
    echo "Usuario no encontrado: $email\n";
    exit(1);
}
$user->password = Hash::make($new);
$user->save();

echo "Password updated for $email\n";
