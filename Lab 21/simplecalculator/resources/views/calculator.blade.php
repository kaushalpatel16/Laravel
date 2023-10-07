<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
</head>
<body>
    <h1>Calculator</h1>
    <form action="/calculate" method="post">
        @csrf
        <input type="number" name="num1" placeholder="Enter number 1" required>
        <input type="number" name="num2" placeholder="Enter number 2" required>
        <select name="operation">
            <option value="add">Add</option>
            <option value="subtract">Subtract</option>
            <option value="multiply">Multiply</option>
            <option value="divide">Divide</option>
        </select>
        <button type="submit">Calculate</button>
    </form>
</body>
</html>
