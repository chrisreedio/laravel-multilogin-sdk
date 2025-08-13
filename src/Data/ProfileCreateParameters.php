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

class ProfileCreateParameters extends Data
{
    public function __construct(
        public ?ProfileFlags $flags = null,
        public ?ProfileStorage $storage = null,
        public ?ProfileFingerprint $fingerprint = null,
        public ?ProxyData $proxy = null,
        #[MapName('custom_start_urls')]
        /** @var string[] */
        public array $customStartUrls = [],
    ) {
        // If no flags are provided, we need to set the default flags
        if ($this->flags === null) {
            $flags = new ProfileFlags(
                audioMasking: MaskingMode::MASK,
                fontsMasking: MaskingModeWithCustom::MASK,
                geolocationMasking: GeolocationMasking::MASK,
                geolocationPopup: GeolocationPopup::PROMPT,
                graphicsMasking: MaskingModeWithCustom::MASK,
                graphicsNoise: MaskingMode::MASK,
                localizationMasking: MaskingModeWithCustom::MASK,
                mediaDevicesMasking: MaskingModeWithCustom::MASK,
                navigatorMasking: MaskingModeWithCustom::MASK,
                portsMasking: MaskingMode::MASK,
                proxyMasking: ProxyMasking::CUSTOM,
                screenMasking: MaskingModeWithCustom::MASK,
                quicMode: QuicMode::NATURAL,
                timezoneMasking: MaskingModeWithCustom::MASK,
                webrtcMasking: WebRTCMasking::MASK,
                canvasNoise: CanvasNoise::MASK,
                startupBehavior: StartupBehavior::RECOVER,
            );
        }

        // If no storage is provided, we need to set the default storage
        if ($this->storage === null) {
            $this->storage = new ProfileStorage;
        }
    }
}
