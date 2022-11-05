<!-- Checkout Modal -->
<?php 
    $sql = "SELECT * FROM users WHERE id='$userId'"; 
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
        $phone = $row['phone'];
?>
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="checkoutModal">Enter Your Details:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="partials/_manageCart.php" method="post">
                <small>Timings: 09:00 to 20:00</small>
                <div class="form-row">
                <div class="form-group col-md-6 mb-0">
                        <b><label for="Time">Take-Away Time:</label></b>
                        <input type="time" class="form-control" id="takeAwayTime" name="takeAwayTime" min="09:00" max="20:00">                    
                    </div>
                    <div class="form-group col-md-6 mb-0">
                        <b><label for="phone">Phone No:</label></b>
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon">+91</span>
                        </div>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="xxxxxxxxxx" required pattern="[0-9]{10}" maxlength="10" value=<?php echo $phone;?>>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="amount" value="<?php echo $totalPrice ?>">
                    <button type="submit" name="checkout" class="btn btn-success">Order</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
<script>

</script>