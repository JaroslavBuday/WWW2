
<form method="post">
    <input  type="text" 
            placeholder="Meno" 
            name="first_name" 
            value="<?= htmlspecialchars($first_name)  ?>" 
            required>
    <br>
    <input  type="text" 
            placeholder="Priezvisko" 
            name="second_name" 
            value="<?= htmlspecialchars($second_name) ?>"  
            required>
    <br>
    <input  type="number"                                 
            placeholder="Vek" 
            min="6" 
            name="age" 
            value="<?= htmlspecialchars($age) ?>"  
            required>
    <br>
    <textarea   name="life" 
                placeholder="Podrobnosti o žiakovi" 
                required><?= htmlspecialchars($life) ?></textarea>
    <br>
    <input  type="text" 
            placeholder="Fakulta" 
            name="college" 
            value="<?= htmlspecialchars($college) ?>"  
            required>

    <input  type="submit" 
            value="Uložiť">
</form>