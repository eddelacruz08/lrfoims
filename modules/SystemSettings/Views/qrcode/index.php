<div class="row">
    <div class="col-xxl-12">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active"><?= $title ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title ?></h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <?php if(isset($_SESSION['success'])):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['success'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif;?>

    </div> <!-- end col -->

</div>

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>
<div class="row">

    <!-- task details -->
    <div class="col-xxl-12">
        <!-- Portlet card -->
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                <h5 class="card-title mb-0"><?= $title ?></h5>
                                
                <div id="cardCollpase1" class="collapse show text-center">
                    <h3><?=base_url();?></h3>
                    <div id="canvas"></div>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            const qrCode = new QRCodeStyling({
                                width: 450,
                                height: 450,
                                type: "jpeg",
                                data: "<?=base_url();?>",
                                image: "<?=base_url();?>/assets/img/<?=$qrcodeInfo['image'];?>",
                                dotsOptions: {
                                    color: "#4267b2",
                                    type: "rounded"
                                },
                                backgroundOptions: {
                                    color: "#e9ebee",
                                },
                                imageOptions: {
                                    crossOrigin: "anonymous",
                                    margin: 5
                                }
                            });

                            qrCode.append(document.getElementById("canvas"));
                            
                            $("#downloadQrCodeBtn").click(function() {
                                qrCode.download({ name: "website-qrcode-link", extension: "jpeg" });
                            });
                        });
                    </script>

                    <div class="justify-content-center" id="qrcode"></div>

                    <button class="btn btn-primary btn-sm text-center mt-3" type="button" id="downloadQrCodeBtn">  Download Image </button>
                </div>
            </div>
        </div> <!-- end card-->
    </div><!-- end col -->
</div> 