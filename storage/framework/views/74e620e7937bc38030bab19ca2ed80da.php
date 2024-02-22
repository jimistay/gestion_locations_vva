<link rel="stylesheet" href="../../css/formulaire_resa.css">

<h2>Reservez votre logement</h2>
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>
<div class="reservation-heb">
    <div class="reservation-formulaire">
        <form class="reservation-formulaire" method="POST" action="<?php echo e(route('reservation.store', ['noheb' => $noheb])); ?>">
            <?php echo csrf_field(); ?>

            <label>Semaines disponibles</label>
            <select name="semaine">
                <?php $__currentLoopData = $semaine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $se): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $reservationsExist = \App\Models\Resa::where('noheb', $noheb)
                            ->where('DATEDEBSEM', $se->DATEDEBSEM)
                            ->exists();
                    ?>

                    <?php if (! ($reservationsExist)): ?>
                        <option value="<?php echo e($se->DATEDEBSEM); ?>" <?php echo e(request('semaine') == $se->DATEDEBSEM ? 'selected' : ''); ?>>
                            <?php echo e($se->DATEDEBSEM); ?>

                        </option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <a class="p-reservation" href="<?php echo e(route('index')); ?>"><i>Aucune semaine ne vous convient ? Choisissez en une ici à partir de vos critères</i></a>

            <p class="p-reservation"><i>Pour l'utilisateur :</i>  <?php echo e($user->name); ?></p>

            <label for="NBOCCUPANT">Le nombre d'occupants :</label>
            <input type="number" name="NBOCCUPANT" id="NBOCCUPANT">

            <button class="button-reservation" type="submit">Réserver</button>
        </form>
    </div>

</div>

<?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\vacancesvva\resources\views/reservations/formulaireReservation.blade.php ENDPATH**/ ?>