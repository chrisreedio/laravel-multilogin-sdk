<?php

namespace ChrisReedIO\MultiloginSDK\Data;

use ChrisReedIO\MultiloginSDK\Enums\CanvasNoise;
use ChrisReedIO\MultiloginSDK\Enums\GeolocationMasking;
use ChrisReedIO\MultiloginSDK\Enums\GeolocationPopup;
use ChrisReedIO\MultiloginSDK\Enums\MaskingMode;
use ChrisReedIO\MultiloginSDK\Enums\MaskingModeWithCustom;
use ChrisReedIO\MultiloginSDK\Enums\ProxyMasking;
use ChrisReedIO\MultiloginSDK\Enums\QuicMode;
use ChrisReedIO\MultiloginSDK\Enums\StartupBehavior;
use ChrisReedIO\MultiloginSDK\Enums\WebRTCMasking;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;

class ProfileFlags extends Data
{
    public function __construct(
        #[MapName('audio_masking')]
        public MaskingMode $audioMasking,
        #[MapName('fonts_masking')]
        public MaskingModeWithCustom $fontsMasking,
        #[MapName('geolocation_masking')]
        public GeolocationMasking $geolocationMasking,
        #[MapName('geolocation_popup')]
        public GeolocationPopup $geolocationPopup,
        #[MapName('graphics_masking')]
        public MaskingModeWithCustom $graphicsMasking,
        #[MapName('graphics_noise')]
        public MaskingMode $graphicsNoise,
        #[MapName('localization_masking')]
        public MaskingModeWithCustom $localizationMasking,
        #[MapName('media_devices_masking')]
        public MaskingModeWithCustom $mediaDevicesMasking,
        #[MapName('navigator_masking')]
        public MaskingModeWithCustom $navigatorMasking,
        #[MapName('ports_masking')]
        public MaskingMode $portsMasking,
        #[MapName('proxy_masking')]
        public ProxyMasking $proxyMasking,
        #[MapName('screen_masking')]
        public MaskingModeWithCustom $screenMasking,
        #[MapName('quic_mode')]
        public QuicMode $quicMode,
        #[MapName('timezone_masking')]
        public MaskingModeWithCustom $timezoneMasking,
        #[MapName('webrtc_masking')]
        public WebRTCMasking $webrtcMasking,
        #[MapName('canvas_noise')]
        public ?CanvasNoise $canvasNoise = null,
        #[MapName('startup_behavior')]
        public StartupBehavior $startupBehavior = StartupBehavior::RECOVER,
    ) {}
}
