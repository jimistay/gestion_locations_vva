<link rel="stylesheet" href="../../css/detail_resa.css">

<h1>Modifier votre réservation</h1>
<div class="main">
    <form class="detail-resa" method="POST" action="<?php echo e(route('updateReservation', ['noresa' => $reservation->NORESA])); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
        <p class="p-detail-resa"><i>Numéro de la réservation :</i>  <?php echo e($reservation->NORESA); ?></p>
        <p><i>Par l'utilisateur :</i>  <?php echo e($reservation->user->name); ?> (ID: <?php echo e($reservation->id); ?>)</p>
        <p><i>Date de début de sejour :</i>  <?php echo e($reservation->DATEDEBSEM); ?></p>
        <p><i>Numéro d'hébergement :</i>  <?php echo e($reservation->hebergement->NOMHEB); ?> (Numéro: <?php echo e($reservation->NOHEB); ?>)</p>
        <p><i>Date de réservation :</i>  <?php echo e($reservation->DATERESA); ?></p>
        <p><i>Montant des arrhes :</i>  <?php echo e($reservation->MONTANTARRHES); ?></p>
        <p><i>Nombre d'occupants :</i>  <?php echo e($reservation->NBOCCUPANT); ?></p>
        <p><i>Tarif de la semaine de réservation :</i>  <?php echo e($reservation->TARIFSEMRESA); ?></p>
        <label for="CODEETATRESA">Etat de réservation :</label>
        <p><i>Etat de réservation :</i>  <?php echo e($reservation->CODEETATRESA); ?></p>
        <select name="CODEETATRESA" id="CODEETATRESA">
            <option value="AN" <?php echo e($etat_actuel == 'AN' ? 'selected' : ''); ?>>Annulée</option>
            <option value="AV" <?php echo e($etat_actuel == 'AV' ? 'selected' : ''); ?>>Arrhes versées</option>
            <option value="BL" <?php echo e($etat_actuel == 'BL' ? 'selected' : ''); ?>>Bloquée</option>
            <option value="CR" <?php echo e($etat_actuel == 'CR' ? 'selected' : ''); ?>>Clés retirés</option>
            <option value="SL" <?php echo e($etat_actuel == 'SL' ? 'selected' : ''); ?>>Solde</option>
            <option value="TR" <?php echo e($etat_actuel == 'TR' ? 'selected' : ''); ?>>Terminée</option>
        </select>
        <button type="submit">Enregistrer les modifications</button>
    </form>
</div>

<?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\vacancesvva\resources\views/reservations/modificationReservation.blade.php ENDPATH**/ ?>