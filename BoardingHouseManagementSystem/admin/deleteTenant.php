<?php
include('../conn.php');

$tenant_id = $_POST['tenant_id'];

// Check if tenant has related billing
$check = mysqli_query($conn, "SELECT * FROM billing WHERE tenant_id='$tenant_id'");
if (mysqli_num_rows($check) > 0) {
    echo "<script>
        alert('Cannot delete tenant. There are related billing records.');
        window.location = 'tenants.php';
    </script>";
} else {
    mysqli_query($conn, "DELETE FROM tenant WHERE tenant_id='$tenant_id'");
    echo "<script>
        alert('Tenant deleted successfully.');
        window.location = 'tenants.php';
    </script>";
}
?>
