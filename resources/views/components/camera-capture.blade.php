<div
    x-data="{
        stream: null,
        capturedImage: null, // Store the captured image
        capture() {
            const context = this.$refs.canvas.getContext('2d');
            context.drawImage(this.$refs.video, 0, 0, 300, 255);
            this.$refs.canvas.toBlob(blob => {
                const file = new File([blob], 'camera.jpg', { type: 'image/jpeg' });
                $wire.upload('{{ $getStatePath() }}', file, () => {}, () => {}, (err) => { console.error(err); });
                
                // Set the captured image to display
                const url = URL.createObjectURL(blob);
                this.capturedImage = url;

                // Stop camera stream and hide video feed
                this.stopCamera();
            }, 'image/jpeg');
        },
        startCamera() {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(stream => {
                    this.stream = stream;
                    this.$refs.video.srcObject = stream;
                    this.$refs.video.play();
                })
                .catch(err => {
                    console.error('Could not access camera:', err);
                });
        },
        stopCamera() {
            if (this.stream) {
                this.stream.getTracks().forEach(track => track.stop());
                this.stream = null; // Clear the stream to stop the video
            }
        }
    }"
    x-init="startCamera()"
    x-cloak
    class="space-y-2"
>
    <div class="flex flex-col items-center">
        <!-- Video feed is shown before capturing -->
        <template x-if="!capturedImage">
            <video x-ref="video" class="w-80 h-100 border rounded-md" autoplay></video>
        </template>

        <canvas x-ref="canvas" class="hidden" width="300" height="225"></canvas>

         <!-- Display the Captured Image -->
         <template x-if="capturedImage">
            <div class="mt-3">
                <img :src="capturedImage" alt="Captured Image" class="w-80 h-100 border rounded-md" />
            </div>
        </template>

        <!-- Capture Photo Button -->
        <template x-if="!capturedImage">
            <x-filament::button
                type="button"
                @click="capture()"
                class="mt-3"
            >
                Capture Photo
            </x-filament::button>
        </template>

        


       
    </div>

    <input type="hidden" name="{{ $getStatePath() }}" />
</div>
