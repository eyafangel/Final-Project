<!DOCTYPE html>
<html>
<head>
  <title>Scan</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<body> 
  {{-- <script>
  public async ngOnInit() {
console.log("Scanner");
try {
const scanner = new Instascan.Scanner({
captureImage: true,
video: document.getElementById("preview"),
});
const cameraList = await Instascan.Camera.getCameras();
console.log("CAMERA LIST", cameraList);
if (cameraList.length > 0) {
let scanningAttempt = 0;
const backCamera: Camera[] = this.getBackCamera(cameraList);
await scanner.start(backCamera[0]);
this.timerId = setInterval(() => {
const scanResult: Scan = scanner.scan();
console.log("RESULT", scanResult);
scanningAttempt++;
if (scanResult) {
this.onScan.emit(scanResult.content);
scanner.stop();
clearInterval(this.timerId);
}else {
if (scanningAttempt === this.maxTimeoutCount) {
scanner.stop();
clearInterval(this.timerId);
this.onError.emit("NO_QR_CODE_FOUND");
}
}
}, 1000);
}else {
// console.error("No cameras found.");
this.onError.emit("NO_ENV_CAMERA_FOUND");
}
}catch (err) {
console.log(err);
this.onError.emit("NOT_ABLE_TO_PROCESS");
}
}
// BACK CAMERA FILTER
private getBackCamera(cameras: Camera[]) {
return cameras.filter((camera: Camera) => camera.name && camera.name.includes("back"));
}
</script> --}}
    {{-- <video id="preview"></video>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        console.log(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[1]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
    --}}

    <video id="preview"></video>
    <script>
        let scanner = new Instascan.Scanner(
            {
                video: document.getElementById('preview')
            }
        );
        scanner.addListener('scan', function(content) {
            alert('Do you want to open this page?: ' + content);
            window.open(content, "_blank");
        });
        Instascan.Camera.getCameras().then(cameras => 
        {
            if(cameras.length > 0){
                scanner.start(cameras[0]);
            } else {
                console.error("Please enable Camera!");
            }
        });
    </script>
</body>
</html>