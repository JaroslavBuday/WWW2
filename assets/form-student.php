
<form method="post">
    <input  type="text" 
            placeholder="Meno" 
            name="first_name" 
            value="<?= htmlspecialchars($first_name)  ?>" 
            required>
    
    <input  type="text" 
            placeholder="Priezvisko" 
            name="second_name" 
            value="<?= htmlspecialchars($second_name) ?>"  
            required>
    
    <input  type="number"                                 
            placeholder="Vek" 
            min="6" 
            name="age" 
            value="<?= htmlspecialchars($age) ?>"  
            required>
    
    <input  type="text" 
            placeholder="Fakulta" 
            name="college" 
            value="<?= htmlspecialchars($college) ?>"  
            required>
    <textarea   name="life" 
                placeholder="Podrobnosti o žiakovi" 
                required><?= htmlspecialchars($life) ?></textarea>
    
    

    <input  type="submit" 
            value="Uložiť">
</form>