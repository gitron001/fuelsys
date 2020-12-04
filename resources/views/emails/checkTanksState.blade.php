<!DOCTYPE html>
<html>
<body>

<h4>Tank: {{ $tankName }}</h4>
<p>Current tank level: {{ round($present,2) }} liters</p>
<p>Total liter for {{ $tankProductName}}: {{ round($salesPerTank,2) }} liters</p>

</body>
</html>
