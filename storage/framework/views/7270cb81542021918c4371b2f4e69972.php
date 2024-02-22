<link rel="stylesheet" href="../../css/ajouter_heb.css">

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<h1>Ajouter un hébérgement</h1>
<form method="post" action="<?php echo e(route('ajouter-un-hebergement')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
<div class="all_page-heb">
    <div class="ajouter-heb">
        <div class="label-input">
            <label for="CODETYPEHEB">Type:</label>
            <select name="CODETYPEHEB">
                <?php $__currentLoopData = $nom_type_heb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $codeTypeHeb => $nomTypeHeb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($codeTypeHeb); ?>"><?php echo e($nomTypeHeb); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="label-input">
            <label for="NOMHEB" >Nom de l'hébérgement:</label>
            <input  name="NOMHEB" id="NOMHEB">
        </div>

        <div class="label-input">
            <label for="NBPLACEHEB">Nombre de place:</label>
            <input  name="NBPLACEHEB" id="NBPLACEHEB" type="number">
        </div>

        <div class="label-input">
            <label for="SURFACEHEB">La surface:</label>
            <input name="SURFACEHEB"  id="SURFACEHEB" type="number">
        </div>

        <div class="label-input">
            <label for="INTERNET">Internet:</label>
            <input type="checkbox" name="INTERNET" id="INTERNET" value="1">
        </div>

        <div class="label-input">
            <label for="ANNEEHEB">L'année de sa dernière remise en état:</label>
            <input type="number" name="ANNEEHEB" id="ANNEEHEB">
        </div>
        <div class="label-input">
            <label for="SECTEURHEB">Secteur:</label>
            <select name="SECTEURHEB">
                <option>Secteur A</option>
                <option>Secteur B</option>
                <option>Secteur C</option>
            </select>
        </div>

        <div class="label-input">
            <label for="ORIENTATIONHEB">Orientation:</label>
            <select name="ORIENTATIONHEB">
                <option>Nord</option>
                <option>Sud</option>
                <option>Est</option>
                <option>Ouest</option>
            </select>
        </div>

        <div class="label-input">
            <label for="ETATHEB">Etat:</label>
            <select name="ETATHEB">
                <option>En rénovation</option>
                <option>Excellent</option>
                <option>Bon</option>
                <option>Mauvais</option>
            </select>
        </div>

        <div class="label-input">
            <label for="DESCRIHEB">Description:</label>
            <input name="DESCRIHEB" id="DESCRIHEB">
        </div>

        <div class="label-input">
            <label for="TARIFSEMHEB">Tarif:</label>
            <input type="number" name="TARIFSEMHEB" id="TARIFSEMHEB">
        </div>

        <div class="label-input">
            <label for="PHOTOHEB">Photographie:</label>
            <input type="file" name="PHOTOHEB" id="PHOTOHEB">
        </div>

    </div>

    <div class="btn-ajout-heb">
        <button class="ajouter-btn-heb" type="submit">Ajouter</button>
    </div>
</div>
</form>

<?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\vacancesvva\resources\views/gestionnaire/ajouterHebergement.blade.php ENDPATH**/ ?>