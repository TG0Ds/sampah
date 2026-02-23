<?php $__env->startSection('title', 'Register'); ?>

<?php $__env->startSection('content'); ?>
<div class="text-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Register as Warga</h1>
    <a href="<?php echo e(route('warga.login')); ?>" class="text-sm text-gray-500 hover:text-green-600 mt-2 inline-block">
        <i class="fas fa-arrow-left mr-1"></i> Back to login
    </a>
</div>

<div class="bg-white rounded-lg shadow-lg p-8">
    <form action="<?php echo e(route('register.submit')); ?>" method="POST" class="space-y-4">
        <?php echo csrf_field(); ?>
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input id="name" name="name" type="text" value="<?php echo e(old('name')); ?>" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                   placeholder="e.g. 12345">
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" value="<?php echo e(old('email')); ?>" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                   placeholder="e.g. user@example.com">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" name="password" type="password" value="<?php echo e(old('password')); ?>" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                   placeholder="Password">
        </div>
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">password confirmation</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                   placeholder="password confirmation">
        </div>
        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            <i class="fas fa-user-plus mr-2"></i> Register
        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Games_And_Stuffs\coding\XII_pplg_1\sampah\resources\views\auth\warga\register.blade.php ENDPATH**/ ?>