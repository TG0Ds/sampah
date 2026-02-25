<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Library'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar-item.active {
            background-color: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <div class="w-64 bg-blue-900 text-white flex flex-col">
            <div class="p-6">
                <h1 class="text-2xl font-bold">Library</h1>
            </div>
            <nav class="flex-1 px-4">
                <a href="<?php echo e(route('dashboard')); ?>" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 hover:bg-blue-800 <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
                    <i class="fas fa-gauge w-5"></i>
                    <span>Dashboard</span>
                </a>
                
                <a href="<?php echo e(route('dataTagihan.index')); ?>" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 hover:bg-blue-800 <?php echo e(request()->routeIs('transactions.*') ? 'active' : ''); ?>">
                    <i class="fas fa-file-alt w-5"></i>
                    <span>Data Tagihan</span>
                </a>
            </nav>
            <div class="p-4 border-t border-blue-800">
                <?php if(auth()->guard()->check()): ?>
                    <div class="mb-4 px-4 py-2">
                        <div class="text-sm text-blue-200">
                            <i class="fas fa-user mr-2"></i>
                            <?php echo e(auth()->user()->name); ?>

                        </div>
                        <div class="text-xs text-blue-300 mt-1">
                            <?php if(auth()->user()->name): ?>
                                <?php echo e(auth()->user()->name); ?> ·
                            <?php endif; ?>
                            <?php echo e(ucfirst(auth()->user()->role)); ?>

                        </div>
                    </div>
                    <div class="space-y-2 px-4">
                        
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="w-full flex items-center space-x-2 px-4 py-2 rounded-lg bg-blue-800 hover:bg-blue-700 transition">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
            <div class="p-4 flex justify-center border-t border-blue-800">
                <button class="w-8 h-8 rounded-full bg-blue-800 hover:bg-blue-700 flex items-center justify-center">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto">
            <div class="p-8">
                <?php if(session('success')): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
</body>
</html>

<?php /**PATH C:\Games_And_Stuffs\coding\XII_pplg_1\sampah\resources\views/layouts/app.blade.php ENDPATH**/ ?>