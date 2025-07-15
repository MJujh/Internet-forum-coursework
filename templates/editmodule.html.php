<form action="" method="post">
    <label for="name">adjust your module name here;</label>
    <textarea name="name" rows="5" cols="70"><?= htmlspecialchars($module['Mname'], ENT_QUOTES, 'UTF-8') ?></textarea>
    <input type="submit"  name="submit" value="Edit Module">
</form>