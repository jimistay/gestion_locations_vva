<link rel="stylesheet" href="../../css/connexion.css">
<link rel="stylesheet" href="../../css/menu.css">

<h1 class="connexion-h1">Se connecter</h1>
<div class="all-page-connexion">
    <div class="elements-connexion">
        <form action="<?php echo e(route('auth.login')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="login">
                <label class="label-style-connexion" for="email">Email</label>
                <input class="input-style-connexion" type="email" id="email" name="email" value="<?php echo e(old('email')); ?>">
                <?php $__errorArgs = ["email"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <?php echo e($message); ?>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="password">
                <label class="label-style-connexion" for="password">Mot de passe</label>
                <input class="input-style-connexion" type="password" id="password" name="password">
                <?php $__errorArgs = ["password"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <?php echo e($message); ?>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <button class="connexion-button">Se connecter</button>
        </form>
    </div>
</div>

<?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\vacancesvva\resources\views/auth/login.blade.php ENDPATH**/ ?>