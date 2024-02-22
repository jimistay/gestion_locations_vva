<link rel="stylesheet" href="../css/style.css">

<h1>Bienvenue dans le village VVA</h1>
<div>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

            <?php if(session('reservationNumber')): ?>
                Numéro de réservation : <?php echo e(session('reservationNumber')); ?>

            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<div class="main">
    <div class="recherche">
        <form action="<?php echo e(route('index')); ?>" method="get">
            <label for="filter">Nom:</label>
            <input type="text" name="filter" id="filter" value="<?php echo e(request('filter')); ?>">

            <label for="type_heb">Type d'hébergement:</label>
            <select name="type_heb" id="type_heb">
                <option value="">Tous</option>
                <?php $__currentLoopData = $nom_type_heb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $nom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($code); ?>" <?php echo e(request('type_heb') == $code ? 'selected' : ''); ?>><?php echo e($nom); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <label for="nb_places">Nombre de places:</label>
            <input type="number" name="nb_places" id="nb_places" value="<?php echo e(request('nb_places')); ?>">

            <label for="surface">La surface:</label>
            <input type="number" name="surface" id="surface" value="<?php echo e(request('surface')); ?>">

            <label for="internet">Internet:</label>
            <input type="checkbox" name="internet" id="internet" <?php echo e(request('internet') ? 'checked' : ''); ?>>

            <label for="secteur">Secteur:</label>
            <select name="secteur" id="secteur">
                <option value="">Tous</option>
                <option value="Secteur A"> Secteur A</option>
                <option value="Secteur B"> Secteur B</option>
                <option value="Secteur C"> Secteur C</option>
            </select>

            <label for="orientation">Orientation:</label>
            <select name="orientation" id="orientation">
                <option value="">Tous</option>
                <option value="Nord">Nord</option>
                <option value="Est">Est</option>
                <option value="Ouest">Ouest</option>
                <option value="Sud">Sud</option>
            </select>

            <label for="etat">Etat:</label>
            <select name="etat" id="etat">
                <option value="">Tous</option>
                <option value="Excellent">Excellent</option>
                <option value="Bon">Bon</option>
                <option value="Moyen">Moyen</option>
                <option value="Mauvais">Mauvais</option>
            </select>

            <label for="tarif">Tarif:</label>
            <input type="number" name="tarif" id="tarif" value="<?php echo e(request('tarif')); ?>">

            <p>Quand vous voulez partir?</p>
            <label >Début de votre séjour:</label>
            <select name="semaine">
                <option value="">Je ne sais pas encore</option>
                <?php $__currentLoopData = $semaine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $se): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($se->DATEDEBSEM); ?>" <?php echo e(request('semaine') == $se->DATEDEBSEM ? 'selected' : ''); ?>><?php echo e($se->DATEDEBSEM); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <button type="submit" class="button-recherche">Rechercher</button>
        </form>
    </div>
    <div class="hebergements">
        <?php $__currentLoopData = $hebergements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hebergement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="hebergement">
                <?php if($hebergement->PHOTOHEB): ?>
                    <img src="<?php echo e(asset('storage/photos/' . str_replace('photos/', '', $hebergement->PHOTOHEB))); ?>" alt="Photo de l'hébergement">
                <?php else: ?>
                    <p><i>Aucune photo disponible</i></p>
                <?php endif; ?>
                <p><i>Nom :</i> <?php echo e($hebergement->NOMHEB); ?></p>

                <?php if($hebergement->INTERNET == 1): ?>
                    <p><i>Possède une connection internet</i></p>
                    <?php else: ?>
                    <p><i>Ne possède pas de connexion internet</i></p>
                <?php endif; ?>

                <p><i>L'emplacement :</i> <?php echo e($hebergement->SECTEURHEB); ?> <i>situé dans :</i>  <?php echo e($hebergement->ORIENTATIONHEB); ?></p>
                <p><?php echo e($hebergement->TARIFSEMHEB); ?> € <i>par semaine</i></p>
                <p></p>
                <a href="<?php echo e(route('logementDetail', ['noheb' => $hebergement->NOHEB])); ?>">Voire plus de détails</a>
                    <div>
                        <?php if(auth()->guard()->check()): ?>
                            <?php if(Auth::user()->TYPECOMPTE == 'ges'): ?>
                                <a href="<?php echo e(route('modifier-hebergement', $hebergement->NOHEB)); ?>">Modifier</a>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <?php if(Auth::user()->TYPECOMPTE == 'ges' || Auth::user()->TYPECOMPTE == 'vac'): ?>
                                <a href="<?php echo e(route('reservation', ['noheb' => $hebergement->NOHEB])); ?>">Réserver</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>


<?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\vacancesvva\resources\views/index.blade.php ENDPATH**/ ?>