<link rel="stylesheet" href="../../css/list_user.css">

<div class="main">
    <h1>Voici tous les utilisateurs</h1>
    <div class="users">
        <h2>Voici tous les vacanciers</h2>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($vac->TYPECOMPTE == 'vac'): ?>
                <table>
                    <tr>
                        <td><?php echo e($vac->email); ?></td>
                        <td><?php echo e($vac->password); ?></td>
                        <td><?php echo e($vac->name); ?></td>
                    </tr>
                </table>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="gestionnaires">
        <h2>Voici tous gestionnaires</h2>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ges): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($ges->TYPECOMPTE == 'ges'): ?>
                <table>
                    <tr>
                        <td><?php echo e($ges->email); ?></td>
                        <td><?php echo e($ges->password); ?></td>
                        <td><?php echo e($ges->name); ?></td>
                    </tr>
                </table>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

</div>


<?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\vacancesvva\resources\views/admin/listUtilisateurs.blade.php ENDPATH**/ ?>