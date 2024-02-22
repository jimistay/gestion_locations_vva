<link rel="stylesheet" href="../css/detail_heb.css">

<div class="hebergements">
    <div class="hebergement">
        <p class="p_heb"><i>Nom :</i>  <?php echo e($hebergement->NOMHEB); ?></p>
        <p class="p_heb"><i>Type de l'hébérgement :</i>  <?php echo e($nom_type_heb[$hebergement->CODETYPEHEB]); ?></p>
        <p class="p_heb"><i>Nombre de places :</i>  <?php echo e($hebergement->NBPLACEHEB); ?></p>
        <p class="p_heb"><i>Surface :</i>  <?php echo e($hebergement->SURFACEHEB); ?></p>
        <?php if($hebergement->INTERNET == 1): ?>
            <p class="p_heb"><i>Possède une connection internet</i> </p>
        <?php endif; ?>
        <p class="p_heb"><i>Année de la dernière remise en état :</i>  <?php echo e($hebergement->ANNEEHEB); ?></p>
        <p class="p_heb"><i>L'emplacement :</i>  <?php echo e($hebergement->SECTEURHEB); ?> <i>situé dans :</i>  <?php echo e($hebergement->ORIENTATIONHEB); ?></p>
        <p class="p_heb"><i>L'état :</i>  <?php echo e($hebergement->ETATHEB); ?></p>
        <p class="p_heb"><i>Description :</i>  <?php echo e($hebergement->DESCRIHEB); ?></p>
        <p class="p_heb"><i>Photo : </i> </p>
        <?php if($hebergement->PHOTOHEB): ?>
            <img src="<?php echo e(asset('storage/photos/' . str_replace('photos/', '', $hebergement->PHOTOHEB))); ?>" alt="Photo de l'hébergement">
        <?php else: ?>
            <p class="p_heb"><i>Aucune photo disponible</i> </p>
        <?php endif; ?>
        <p class="p_heb"><i>Tarif :</i>  <?php echo e($hebergement->TARIFSEMHEB); ?>€ <i>par semaine</i></p>
    </div>
</div>

<?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\vacancesvva\resources\views/hebergement.blade.php ENDPATH**/ ?>