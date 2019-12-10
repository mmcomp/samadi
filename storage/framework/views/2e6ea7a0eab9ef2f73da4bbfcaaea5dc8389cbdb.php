<label for="status">Status </label>
<select name="status" id="status" class="form-control select2">
    <option value="0" <?php if($status == 0 || old('status') == 0): ?> selected="selected" <?php endif; ?>>Disable</option>
    <option value="1" <?php if($status == 1 || old('status') == 1): ?> selected="selected" <?php endif; ?>>Enable</option>
</select>