<?php
    $statusColors = [
        'unpaid' => 'bg-gray-100 text-gray-800',
        'overdue' => 'bg-red-100 text-red-800',
        'paid_late' => 'bg-yellow-100 text-yellow-800',
        'paid' => 'bg-green-100 text-green-800',
    ];
?>

<?php $__env->startSection('title', 'DataTagihan'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-800">Data Tagihan</h1>
    <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->user()->role === 'admin'): ?>
            <a href="<?php echo e(route('dataTagihan.create')); ?>" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-plus mr-2"></i>Tambah Tagihan
            </a>
        <?php endif; ?>
    <?php endif; ?>
</div>

<form method="GET" action="<?php echo e(route('dataTagihan.index')); ?>" class="mb-4">
    <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari nama warga..." class="border rounded px-4 py-2 w-64">
    <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Cari</button>
</form>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->role === 'admin'): ?>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Warga name</th>
                    <?php endif; ?>
                <?php endif; ?>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Amount</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Billing Start Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">due date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">paid date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php $__empty_1 = true; $__currentLoopData = $dataTagihan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->role === 'admin'): ?>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo e($item->user->name ?? '-'); ?></td>
                    <?php endif; ?>
                <?php endif; ?>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo e($item->total_amount); ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo e($item->billing_start_date->format('d/m/Y')); ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo e($item->due_date->format('d/m/Y')); ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <?php if($item->paid_date): ?>
                        <div class="font-medium"><?php echo e($item->paid_date->format('d/m/Y')); ?></div>
                    <?php else: ?>
                        <div class="text-gray-500">-</div>
                    <?php endif; ?>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo e($item->status_color); ?>">
                        <?php echo e(ucfirst(str_replace('_', ' ', $item->status))); ?>

                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center space-x-2">
                        <a href="<?php echo e(route('dataTagihan.show', $item->id)); ?>" class="bg-purple-500 text-white px-3 py-1.5 rounded hover:bg-purple-600 transition text-sm" title="Detail">
                            <i class="fas fa-eye mr-1"></i>Detail
                        </a>
                        <?php if(auth()->user()->role === 'admin'): ?>
                            <a href="<?php echo e(route('dataTagihan.edit', $item->id)); ?>" class="bg-blue-500 text-white px-3 py-1.5 rounded hover:bg-blue-600 transition text-sm" title="Edit">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            <form action="<?php echo e(route('dataTagihan.destroy', $item->id)); ?>" method="POST" class="inline" onsubmit="return confirm('Hapus data tagihan ini?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="bg-red-500 text-white px-3 py-1.5 rounded hover:bg-red-600 transition text-sm" title="Delete">
                                    <i class="fas fa-trash mr-1"></i>Delete
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="<?php echo e(auth()->user()->role === 'admin' ? 7 : 6); ?>" class="px-6 py-4 text-center text-gray-500">No data tagihan found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Games_And_Stuffs\coding\XII_pplg_1\sampah\resources\views\dataTagihan\index.blade.php ENDPATH**/ ?>