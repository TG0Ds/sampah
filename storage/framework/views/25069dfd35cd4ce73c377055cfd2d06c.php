<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Tagihan</p>
                
            </div>
            <div class="bg-blue-100 rounded-full p-4">
                <i class="fas fa-book text-blue-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Members</p>
                
            </div>
            <div class="bg-green-100 rounded-full p-4">
                <i class="fas fa-users text-green-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Transactions</p>
                
            </div>
            <div class="bg-yellow-100 rounded-full p-4">
                <i class="fas fa-file-alt text-yellow-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Books Borrowed</p>
                
            </div>
            <div class="bg-red-100 rounded-full p-4">
                <i class="fas fa-book-open text-red-600 text-2xl"></i>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Games_And_Stuffs\coding\XII_pplg_1\sampah\resources\views\dashboard.blade.php ENDPATH**/ ?>