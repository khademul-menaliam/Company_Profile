<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

foreach (File::allFiles(app_path('Models')) as $file) {
    $class = 'App\\Models\\' . $file->getFilenameWithoutExtension();
    if (!class_exists($class)) continue;
    $reflection = new ReflectionClass($class);
    if ($reflection->isAbstract()) continue;
    
    try {
        $model = new $class;
        if (!method_exists($model, 'getConnection')) continue;
        $table = $model->getTable();
        $columns = Schema::getColumnListing($table);
        $fillable = $model->getFillable();
        $diff = array_diff($fillable, $columns);
        if (!empty($diff)) {
            echo "Model $class has fillable properties not in table $table: " . implode(', ', $diff) . "\n";
        }
    } catch (\Exception $e) {
        echo "Error checking $class: " . $e->getMessage() . "\n";
    }
}
echo "Done.\n";
