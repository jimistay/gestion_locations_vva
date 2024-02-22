<link rel="stylesheet" href="../../css/detail_resa.css">

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<div class="main">
    <div class="detail-resa">
        <p class="p-detail-resa"><i>N° de réservation :</i> <?php echo e($reservations->NORESA); ?></p>
        <p class="p-detail-resa"><i>Loué par : </i> <?php echo e($reservations->user->name); ?> id n° <?php echo e($reservations->id); ?></p>
        <p class="p-detail-resa"><i>Numéro d'hébergement :</i>  <?php echo e($reservations->NOHEB); ?></p>
        <p class="p-detail-resa"><i>Etat de réservation : </i> <?php echo e($reservations->etat_resa->NOMETATRESA); ?></p>
        <p class="p-detail-resa"><i>Date de réservation :</i>  <?php echo e($reservations->DATERESA); ?></p>
        <p class="p-detail-resa"><i>Arrhes :</i>  <?php echo e($reservations->DATEARRHES); ?></p>
        <p class="p-detail-resa"><i>Montant Arrhes :</i>  <?php echo e($reservations->MONTANTARRHES); ?>€</p>
        <p class="p-detail-resa"><i>Nombre d'occupants :</i>  <?php echo e($reservations->NBOCCUPANT); ?></p>
        <p class="p-detail-resa"><i>Tarif :</i>  <?php echo e($reservations->TARIFSEMRESA); ?> € <i>par semaine</i></p>
    </div>
</div>

<?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\vacancesvva\resources\views/reservations/detailReservation.blade.php ENDPATH**/ ?>