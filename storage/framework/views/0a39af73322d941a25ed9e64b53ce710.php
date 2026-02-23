<?php $__env->startSection('title', 'Admin Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="text-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Login Admin</h1>
    <a href="<?php echo e(route('login')); ?>" class="text-sm text-gray-500 hover:text-blue-600 mt-2 inline-block">
        <i class="fas fa-arrow-left mr-1"></i> Back
    </a>
</div>

<div class="bg-white rounded-lg shadow-lg p-8">
    <form action="<?php echo e(route('admin.login.submit')); ?>" method="POST" class="space-y-4">
        <?php echo csrf_field(); ?>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" value="<?php echo e(old('email')); ?>" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   placeholder="petugas@example.com">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" name="password" type="password" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   placeholder="••••••••">
        </div>
        <div class="flex items-center">
            <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
            <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
        </div>
        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <i class="fas fa-lock mr-2"></i> Login
        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Games_And_Stuffs\coding\XII_pplg_1\sampah\resources\views\auth\admin\login.blade.php ENDPATH**/ ?>