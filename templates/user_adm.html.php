<form action="" method="post">
    <label for="message">ask your question here;</label>
    <textarea name="message" rows="3" cols="40"></textarea> 

<!--     <select name="">
        <option value="">Selecst an author</option>
        <?php foreach ($authors as $author):?>
        <option value="<?=htmlspecialchars($author['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <?=htmlspecialchars($author['name'],ENT_QUOTES,'UTF-8'); ?>
        </option>
        <?php endforeach;?>
    </select>
 -->
<!--     <select name="modules">
        <option value="">Select a module</option>
        <?php foreach ($modules as $module):?>
        <option value="<?=htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <?=htmlspecialchars($module['Mname'],ENT_QUOTES,'UTF-8'); ?>
        </option>
        <?php endforeach;?>
    </select>
    <input type="file" name="img_content" id=""> -->
    <input type="submit"  name="submit" value="Add">
</form>