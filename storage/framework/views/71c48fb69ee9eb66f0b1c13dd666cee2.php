<?php $__env->startSection('title', 'Detail Data Tagihan'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-800">Detail Data Tagihan</h1>
    <div class="flex items-center gap-2">
        <a href="<?php echo e(route('dataTagihan.index')); ?>" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
            <i class="fas fa-arrow-left mr-2"></i>Back
        </a>
        <?php if(!$dataTagihan->paid_date): ?>
            <?php if(auth()->user()->role === 'warga'): ?>
                <form action="<?php echo e(route('dataTagihan.pay', $dataTagihan->id)); ?>" method="POST" class="inline" id="pay-form">
                    <?php echo csrf_field(); ?>
                    <button type="button" onclick="if(confirm('Konfirmasi bayar tagihan ini?')) document.getElementById('pay-form').submit();" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Pay
                    </button>
                </form>
            <?php elseif(auth()->user()->role === 'admin'): ?>
                <form action="<?php echo e(route('dataTagihan.pay', $dataTagihan->id)); ?>" method="POST" class="inline" id="mark-paid-form">
                    <?php echo csrf_field(); ?>
                    <button type="button" onclick="if(confirm('Tandai tagihan ini sebagai sudah dibayar?')) document.getElementById('mark-paid-form').submit();" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Mark as paid
                    </button>
                </form>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<div class="bg-white rounded-lg shadow p-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="border-b md:border-b-0 md:border-r pb-6 md:pb-0 md:pr-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Info Tagihan</h2>
            <div class="space-y-3">
                <div>
                    <label class="text-sm font-medium text-gray-600">Warga name</label>
                    <p class="text-lg font-semibold text-gray-900"><?php echo e($dataTagihan->user->name ?? '-'); ?></p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Total Amount</label>
                    <p class="text-lg text-gray-900"><?php echo e($dataTagihan->total_amount); ?></p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Billing Start Date</label>
                    <p class="text-lg text-gray-900"><?php echo e($dataTagihan->billing_start_date->format('d/m/Y')); ?></p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Due Date</label>
                    <p class="text-gray-900"><?php echo e($dataTagihan->due_date->format('d/m/Y')); ?></p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">paid date</label>
                    <?php if($dataTagihan->paid_date): ?>
                        <div class="font-medium text-gray-900"><?php echo e($dataTagihan->paid_date->format('d/m/Y')); ?></div>
                    <?php else: ?>
                        <div class="text-gray-900">-</div>
                    <?php endif; ?>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Status</label>
                    <p class="<?php echo e($dataTagihan->status_color); ?>"><?php echo e(ucfirst(str_replace('_', ' ', $dataTagihan->status))); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 pt-6 border-t flex justify-end space-x-3">
        <?php if(auth()->guard()->check()): ?>
            <?php if(auth()->user()->role === 'admin'): ?>
                <a href="<?php echo e(route('dataTagihan.edit', $dataTagihan->id)); ?>" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Games_And_Stuffs\coding\XII_pplg_1\sampah\resources\views\dataTagihan\show.blade.php ENDPATH**/ ?>