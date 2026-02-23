<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="text-center mb-8">
    <h1 class="text-3xl font-bold text-gray-800">SamBer</h1>
    <p class="text-gray-600 mt-2">Aplikasi bayar sampah</p>
</div>

<div class="bg-white rounded-lg shadow-lg p-8 space-y-6">
    <p class="text-center text-gray-700 font-medium">Log in as</p>

    <a href="<?php echo e(route('admin.login')); ?>" class="block w-full py-4 px-6 border-2 border-gray-200 rounded-lg hover:border-blue-600 hover:bg-blue-50 transition text-center group">
        <i class="fas fa-user-shield text-2xl text-blue-600 mb-2 block"></i>
        <span class="font-semibold text-gray-800 group-hover:text-blue-600">Admin</span>
        <p class="text-sm text-gray-500 mt-1">Log in with name, email & password</p>
    </a>

    <a href="<?php echo e(route('warga.login')); ?>" class="block w-full py-4 px-6 border-2 border-gray-200 rounded-lg hover:border-green-600 hover:bg-green-50 transition text-center group">
        <i class="fas fa-user-graduate text-2xl text-green-600 mb-2 block"></i>
        <span class="font-semibold text-gray-800 group-hover:text-green-600">Warga</span>
        <p class="text-sm text-gray-500 mt-1">Log in with name, email & password</p>
    </a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Games_And_Stuffs\coding\XII_pplg_1\sampah\resources\views/auth/choose.blade.php ENDPATH**/ ?>