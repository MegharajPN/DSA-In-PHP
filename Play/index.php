<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky 7 Game</title>
</head>
<body>
    <h1>Lucky 7 Game</h1>
    <form action="play.php" method="post">
        <label for="bet">Place your bet (Rs 10 minimum):</label>
        <input type="number" id="bet" name="bet" min="10" max="100" step="10" required><br><br>
        <label for="choice">Choose your option:</label>
        <select id="choice" name="choice" required>
            <option value="below7">Below 7</option>
            <option value="lucky7">Lucky 7</option>
            <option value="above7">Above 7</option>
        </select><br><br>
        <button type="submit">Roll Dice</button>
    </form>
</body>
</html>
