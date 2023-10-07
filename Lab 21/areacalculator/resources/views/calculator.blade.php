<!DOCTYPE html>
<html>
<head>
    <title>Area Calculator</title>
</head>
<body>
    <h1>Area Calculator</h1>
    <form action="/calculate" method="post">
        @csrf
        <select name="shape">
            <option value="square">Square</option>
            <option value="rectangle">Rectangle</option>
            <option value="circle">Circle</option>
        </select>
        <br>
        <input type="number" name="length" placeholder="Enter length/radius" required>
        <input type="number" name="width" placeholder="Enter width (for rectangle)">
        <button type="submit">Calculate</button>
    </form>
</body>
</html>
