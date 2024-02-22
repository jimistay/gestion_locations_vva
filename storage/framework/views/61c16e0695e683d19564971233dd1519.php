<link rel="stylesheet" href="../../css/ajouter_heb.css">

<h1>Modifier les champs nécessaires</h1>
<div class="all_page-heb">
    <div class="ajouter-heb">
        <form class="form-modif-heb"  action="<?php echo e(route('modifier-hebergement', $hebergement->NOHEB)); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
            <div class="label-input">
                <label>Type:</label>
                <select name="CODETYPEHEB">
                    <?php $__currentLoopData = $nom_type_heb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $codeTypeHeb => $nomTypeHeb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($codeTypeHeb); ?>" <?php echo e($hebergement->CODETYPEHEB == $codeTypeHeb ? 'selected' : ''); ?>>
                            <?php echo e($nomTypeHeb); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="label-input">
                <label for="NOMHEB">Nom de l'hébergement:</label>
                <input name="NOMHEB" id="NOMHEB" value="<?php echo e($hebergement->NOMHEB); ?>">
            </div>

            <div class="label-input">
                <label for="NBPLACEHEB">Nombre de place:</label>
                <input name="NBPLACEHEB" id="NBPLACEHEB" type="number" value="<?php echo e($hebergement->NBPLACEHEB); ?>">
            </div>
            <div class="label-input">
                <label for="SURFACEHEB">La surface:</label>
                <input name="SURFACEHEB" id="SURFACEHEB" type="number" value="<?php echo e($hebergement->SURFACEHEB); ?>">
            </div>
            <div class="label-input">
                <label for="INTERNET">Internet:</label>
                <input type="checkbox" name="INTERNET" id="INTERNET" value="1" <?php echo e($hebergement->INTERNET ? 'checked' : ''); ?>>
            </div>

            <div class="label-input">
                <label for="ANNEEHEB">L'année de sa dernière remise en état:</label>
                <input type="number" name="ANNEEHEB" id="ANNEEHEB" value="<?php echo e($hebergement->ANNEEHEB); ?>">
            </div>

            <div class="label-input">
                <label for="SECTEURHEB">Secteur:</label>
                <select name="SECTEURHEB">
                    <option value="Secteur A" <?php echo e($hebergement->SECTEURHEB == 'Secteur A' ? 'selected' : ''); ?>>Secteur A</option>
                    <option value="Secteur B" <?php echo e($hebergement->SECTEURHEB == 'Secteur B' ? 'selected' : ''); ?>>Secteur B</option>
                    <option value="Secteur C" <?php echo e($hebergement->SECTEURHEB == 'Secteur C' ? 'selected' : ''); ?>>Secteur C</option>
                </select>
            </div>

            <div class="label-input">
                <label for="ORIENTATIONHEB">Orientation:</label>
                <select name="ORIENTATIONHEB">
                    <option value="Nord" <?php echo e($hebergement->ORIENTATIONHEB == 'Nord' ? 'selected' : ''); ?>>Nord</option>
                    <option value="Sud" <?php echo e($hebergement->ORIENTATIONHEB == 'Sud' ? 'selected' : ''); ?>>Sud</option>
                    <option value="Est" <?php echo e($hebergement->ORIENTATIONHEB == 'Est' ? 'selected' : ''); ?>>Est</option>
                    <option value="Ouest" <?php echo e($hebergement->ORIENTATIONHEB == 'Ouest' ? 'selected' : ''); ?>>Ouest</option>
                </select>
            </div>

            <div class="label-input">
                <label for="ETATHEB">Etat:</label>
                <select name="ETATHEB">
                    <option value="En rénovation" <?php echo e($hebergement->ETATHEB == 'En rénovation' ? 'selected' : ''); ?>>En rénovation</option>
                    <option value="Excellent" <?php echo e($hebergement->ETATHEB == 'Excellent' ? 'selected' : ''); ?>>Excellent</option>
                    <option value="Bon" <?php echo e($hebergement->ETATHEB == 'Bon' ? 'selected' : ''); ?>>Bon</option>
                    <option value="Mauvais" <?php echo e($hebergement->ETATHEB == 'Mauvais' ? 'selected' : ''); ?>>Mauvais</option>
                </select>
            </div>

            <div class="label-input">
                <label for="DESCRIHEB">Description:</label>
                <input name="DESCRIHEB" id="DESCRIHEB" value="<?php echo e($hebergement->DESCRIHEB); ?>">
            </div>

            <div class="label-input">
                <label for="TARIFSEMHEB">Tarif:</label>
                <input type="number" name="TARIFSEMHEB" id="TARIFSEMHEB" value="<?php echo e($hebergement->TARIFSEMHEB); ?>">
            </div>
            <div class="label-input">
                <label for="PHOTOHEB">Photographie:</label>
                <input type="file" name="PHOTOHEB" id="PHOTOHEB">
            </div>

            <div class="btn-ajout-heb">
                <button class="ajouter-btn-heb" type="submit">Enregistrer les modifications</button>
            </div>


        </form>
    </div>
</div>

<?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\vacancesvva\resources\views/gestionnaire/modifierHebergement.blade.php ENDPATH**/ ?>