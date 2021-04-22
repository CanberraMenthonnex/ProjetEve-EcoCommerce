<?php if(isset($errorMessage) && $errorMessage || isset($defaultMessage) && $defaultMessage): ?>
    <div class="alert" id="alert-modal">

        <div class="alert--modal <?= $errorMessage ? "alert-error"  : "alert-success" ?>">
            <p>
                <?= $errorMessage ?? $defaultMessage ?>
            </p>
            <button class="alert--btn" id="alert-btn">Ok</button>
        </div>

    </div>
<?php endif ?>