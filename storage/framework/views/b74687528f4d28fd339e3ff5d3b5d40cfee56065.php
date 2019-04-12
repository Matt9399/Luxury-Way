<?php if(Auth::guard('web')->check()): ?>
    <p class="text-success">
        You are logged In as a <strong>USER</strong>
    </p>
<?php else: ?>
    <p class="text-danger">
        You are logged Out as a <strong>USER</strong>
    </p>
<?php endif; ?>

<?php if(Auth::guard('admin')->check()): ?>
<p class="text-success">
    You are logged In as a <strong>ADMIN</strong>
</p>
<?php else: ?>
<p class="text-danger">
    You are logged Out as a <strong>ADMIN</strong>
</p>
<?php endif; ?>
