<?php
/**
 * Inline SVG explanatory diagrams used by the universal service-detail renderer.
 * Clean line-art schematics (not photos) the client accepted in place of
 * clinical/"scary" imagery. Each is swappable for a real illustration later.
 *   implant-anatomy     -> single-dental-implants (implant acts as the tooth root)
 *   filling-process     -> dental-fillings (decay -> cleaned -> filled)
 *   crown-cap           -> dental-crowns (porcelain cap over the prepared tooth)
 *   bone-graft-process  -> bone-grafting (tooth loss -> graft -> new bone)
 */
defined( 'ABSPATH' ) || exit;

function ds_diagram_svg( $name ) {
	$d = array();

	$d['implant-anatomy'] = <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" class="ds-diagram ds-diagram--implant" role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 600 470" width="600" height="470" font-family="Montserrat, Arial, sans-serif">
<rect x="86" y="222" width="248" height="214" rx="18" fill="#ECE3D6" stroke="#D8C9B2" stroke-width="1.6"/>
<circle cx="120" cy="300" r="4" fill="none" stroke="#D8C9B2" stroke-width="1.4"/>
<circle cx="150" cy="360" r="3" fill="none" stroke="#D8C9B2" stroke-width="1.4"/>
<circle cx="290" cy="280" r="3.5" fill="none" stroke="#D8C9B2" stroke-width="1.4"/>
<circle cx="300" cy="360" r="4" fill="none" stroke="#D8C9B2" stroke-width="1.4"/>
<circle cx="110" cy="400" r="3" fill="none" stroke="#D8C9B2" stroke-width="1.4"/>
<circle cx="270" cy="410" r="3" fill="none" stroke="#D8C9B2" stroke-width="1.4"/>
<circle cx="160" cy="260" r="3" fill="none" stroke="#D8C9B2" stroke-width="1.4"/>
<path d="M76 210 Q206 188 336 210 L336 232 Q206 250 76 232 Z" fill="#E9C4BC" stroke="#D9A99F" stroke-width="1.6"/>
<path d="M152 206 C150 156 152 120 170 106 C182 97 192 104 206 104 C220 104 230 97 242 106 C260 120 262 156 260 206 Z" fill="#FFFFFF" stroke="#3A3A3A" stroke-width="2.6" stroke-linejoin="round"/>
<path d="M194 126 C189 152 189 178 193 200" fill="none" stroke="#E4E4E0" stroke-width="2"/>
<path d="M222 126 C227 152 227 178 221 200" fill="none" stroke="#E4E4E0" stroke-width="2"/>
<path d="M192 208 L220 208 L214 240 L198 240 Z" fill="#A8D5D0" stroke="#5A9A93" stroke-width="2"/>
<path d="M186 240 L226 240 L212 410 L206 418 L200 410 Z" fill="#7FB5B0" stroke="#5A9A93" stroke-width="2.2" stroke-linejoin="round"/>
<line x1="190" y1="254" x2="222" y2="258" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round"/>
<line x1="192" y1="271" x2="220" y2="275" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round"/>
<line x1="193" y1="288" x2="219" y2="292" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round"/>
<line x1="194" y1="305" x2="218" y2="309" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round"/>
<line x1="196" y1="322" x2="216" y2="326" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round"/>
<line x1="197" y1="339" x2="215" y2="343" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round"/>
<line x1="199" y1="356" x2="213" y2="360" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round"/>
<line x1="200" y1="373" x2="212" y2="377" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round"/>
<line x1="201" y1="390" x2="211" y2="394" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round"/>
<circle cx="258" cy="138" r="3.4" fill="#7FB5B0"/>
<path d="M258 138 L360 138 L372 114" fill="none" stroke="#7FB5B0" stroke-width="1.4"/>
<text x="372" y="128" font-size="16.5" font-weight="700" fill="#3A3A3A" text-anchor="start">Crown</text>
<text x="372" y="147" font-size="12.5" fill="#6B6B6B" text-anchor="start">Looks &amp; feels like a real tooth</text>
<circle cx="220" cy="224" r="3.4" fill="#7FB5B0"/>
<path d="M220 224 L360 224 L372 198" fill="none" stroke="#7FB5B0" stroke-width="1.4"/>
<text x="372" y="212" font-size="16.5" font-weight="700" fill="#3A3A3A" text-anchor="start">Abutment</text>
<text x="372" y="231" font-size="12.5" fill="#6B6B6B" text-anchor="start">Connects the crown to the post</text>
<circle cx="228" cy="322" r="3.4" fill="#7FB5B0"/>
<path d="M228 322 L360 322 L372 298" fill="none" stroke="#7FB5B0" stroke-width="1.4"/>
<text x="372" y="312" font-size="16.5" font-weight="700" fill="#3A3A3A" text-anchor="start">Titanium post</text>
<text x="372" y="331" font-size="12.5" fill="#6B6B6B" text-anchor="start">Acts as your new tooth root</text>
<circle cx="330" cy="392" r="3.4" fill="#7FB5B0"/>
<path d="M330 392 L360 392 L372 388" fill="none" stroke="#7FB5B0" stroke-width="1.4"/>
<text x="372" y="402" font-size="16.5" font-weight="700" fill="#3A3A3A" text-anchor="start">Jawbone</text>
<text x="372" y="421" font-size="12.5" fill="#6B6B6B" text-anchor="start">Stays stimulated &amp; healthy</text>
</svg>
SVG;

	$d['filling-process'] = <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" class="ds-diagram ds-diagram--filling" role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 600 250" width="600" height="250" font-family="Montserrat, Arial, sans-serif">
<path d="M68 150 C64 110 70 84 88 82 C102 80 106 90 110 90 C114 90 118 80 132 82 C150 84 156 110 152 150 C150 168 140 176 132 196 C128 204 118 204 116 192 L113 168 C112 160 108 160 107 168 L104 192 C102 204 92 204 88 196 C80 176 70 168 68 150 Z" fill="#FFFFFF" stroke="#3A3A3A" stroke-width="2.6" stroke-linejoin="round"/>
<path d="M84 108 C80 124 90 134 102 132 C112 130 110 112 100 106 C92 102 86 102 84 108 Z" fill="#9C7A53" stroke="#6E5538" stroke-width="1.4"/>
<path d="M258 150 C254 110 260 84 278 82 C292 80 296 90 300 90 C304 90 308 80 322 82 C340 84 346 110 342 150 C340 168 330 176 322 196 C318 204 308 204 306 192 L303 168 C302 160 298 160 297 168 L294 192 C292 204 282 204 278 196 C270 176 260 168 258 150 Z" fill="#FFFFFF" stroke="#3A3A3A" stroke-width="2.6" stroke-linejoin="round"/>
<path d="M274 108 C270 124 280 134 292 132 C302 130 300 112 290 106 C282 102 276 102 274 108 Z" fill="#F3F2EE" stroke="#5A9A93" stroke-width="1.8" stroke-dasharray="4 3"/>
<path d="M448 150 C444 110 450 84 468 82 C482 80 486 90 490 90 C494 90 498 80 512 82 C530 84 536 110 532 150 C530 168 520 176 512 196 C508 204 498 204 496 192 L493 168 C492 160 488 160 487 168 L484 192 C482 204 472 204 468 196 C460 176 450 168 448 150 Z" fill="#FFFFFF" stroke="#3A3A3A" stroke-width="2.6" stroke-linejoin="round"/>
<path d="M464 108 C460 124 470 134 482 132 C492 130 490 112 480 106 C472 102 466 102 464 108 Z" fill="#A8D5D0" stroke="#5A9A93" stroke-width="1.6"/>
<path d="M468 112 C472 110 476 112 478 116" fill="none" stroke="#FFFFFF" stroke-width="1.6" stroke-linecap="round"/>
<path d="M205 120 L229 120 M221 113 L229 120 L221 127" fill="none" stroke="#7FB5B0" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M395 120 L419 120 M411 113 L419 120 L411 127" fill="none" stroke="#7FB5B0" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
<text x="110" y="228" font-size="14.5" font-weight="700" fill="#3A3A3A" text-anchor="middle">1 &middot; Decay</text>
<text x="300" y="228" font-size="14.5" font-weight="700" fill="#3A3A3A" text-anchor="middle">2 &middot; Cleaned</text>
<text x="490" y="228" font-size="14.5" font-weight="700" fill="#3A3A3A" text-anchor="middle">3 &middot; Filled &amp; sealed</text>
</svg>
SVG;

	$d['crown-cap'] = <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" class="ds-diagram ds-diagram--crown" role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 600 470" width="600" height="470" font-family="Montserrat, Arial, sans-serif">
<rect x="86" y="222" width="248" height="214" rx="18" fill="#ECE3D6" stroke="#D8C9B2" stroke-width="1.6"/>
<circle cx="120" cy="300" r="4" fill="none" stroke="#D8C9B2" stroke-width="1.4"/>
<circle cx="150" cy="360" r="3" fill="none" stroke="#D8C9B2" stroke-width="1.4"/>
<circle cx="300" cy="300" r="3.5" fill="none" stroke="#D8C9B2" stroke-width="1.4"/>
<circle cx="300" cy="370" r="4" fill="none" stroke="#D8C9B2" stroke-width="1.4"/>
<circle cx="112" cy="400" r="3" fill="none" stroke="#D8C9B2" stroke-width="1.4"/>
<circle cx="280" cy="410" r="3" fill="none" stroke="#D8C9B2" stroke-width="1.4"/>
<path d="M76 210 Q206 188 336 210 L336 232 Q206 250 76 232 Z" fill="#E9C4BC" stroke="#D9A99F" stroke-width="1.6"/>
<path d="M182 150 L230 150 C234 170 236 190 235 210 C233 282 224 342 216 392 C212 402 200 402 196 392 C188 342 179 282 177 210 C176 190 178 170 182 150 Z" fill="#F4EEE3" stroke="#3A3A3A" stroke-width="2.4" stroke-linejoin="round"/>
<path d="M166 134 C164 90 170 56 206 54 C242 56 248 90 246 134 C232 144 180 144 166 134 Z" fill="#FFFFFF" stroke="#3A3A3A" stroke-width="2.6" stroke-linejoin="round"/>
<path d="M180 128 C200 136 212 136 232 128" fill="none" stroke="#E4E4E0" stroke-width="2"/>
<path d="M206 140 L206 150 M200 144 L206 150 L212 144" fill="none" stroke="#7FB5B0" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
<circle cx="244" cy="92" r="3.4" fill="#7FB5B0"/>
<path d="M244 92 L360 92 L372 72" fill="none" stroke="#7FB5B0" stroke-width="1.4"/>
<text x="372" y="86" font-size="16.5" font-weight="700" fill="#3A3A3A">Porcelain crown</text>
<text x="372" y="105" font-size="12.5" fill="#6B6B6B">Shaded to match your teeth</text>
<circle cx="232" cy="178" r="3.4" fill="#7FB5B0"/>
<path d="M232 178 L360 178 L372 182" fill="none" stroke="#7FB5B0" stroke-width="1.4"/>
<text x="372" y="196" font-size="16.5" font-weight="700" fill="#3A3A3A">Prepared tooth</text>
<text x="372" y="215" font-size="12.5" fill="#6B6B6B">Gently reshaped to take the crown</text>
<circle cx="230" cy="320" r="3.4" fill="#7FB5B0"/>
<path d="M230 320 L360 320 L372 316" fill="none" stroke="#7FB5B0" stroke-width="1.4"/>
<text x="372" y="330" font-size="16.5" font-weight="700" fill="#3A3A3A">Natural root</text>
<text x="372" y="349" font-size="12.5" fill="#6B6B6B">Your own root stays in place</text>
</svg>
SVG;

	$d['bone-graft-process'] = <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" class="ds-diagram ds-diagram--bonegraft" role="img" preserveAspectRatio="xMidYMid meet" viewBox="0 0 600 270" width="600" height="270" font-family="Montserrat, Arial, sans-serif">
<path d="M52 200 L52 120 C66 96 80 92 90 118 C100 150 120 150 130 118 C140 92 154 96 168 120 L168 200 Z" fill="#ECE3D6" stroke="#D8C9B2" stroke-width="1.8" stroke-linejoin="round"/>
<path d="M52 118 C66 94 80 90 90 116 C100 148 120 148 130 116 C140 90 154 94 168 118" fill="none" stroke="#D9A99F" stroke-width="5"/>
<path d="M242 200 L242 110 C270 96 330 96 358 110 L358 200 Z" fill="#ECE3D6" stroke="#D8C9B2" stroke-width="1.8" stroke-linejoin="round"/>
<path d="M270 116 C282 104 318 104 330 116 C322 140 278 140 270 116 Z" fill="#F3EFE7" stroke="#5A9A93" stroke-width="1.6" stroke-dasharray="4 3"/>
<circle cx="284" cy="118" r="3.4" fill="#CBB68F" stroke="#A8916A" stroke-width="1"/>
<circle cx="296" cy="116" r="3.4" fill="#CBB68F" stroke="#A8916A" stroke-width="1"/>
<circle cx="308" cy="118" r="3.4" fill="#CBB68F" stroke="#A8916A" stroke-width="1"/>
<circle cx="290" cy="128" r="3.4" fill="#CBB68F" stroke="#A8916A" stroke-width="1"/>
<circle cx="302" cy="127" r="3.4" fill="#CBB68F" stroke="#A8916A" stroke-width="1"/>
<circle cx="314" cy="126" r="3.4" fill="#CBB68F" stroke="#A8916A" stroke-width="1"/>
<circle cx="298" cy="122" r="3.4" fill="#CBB68F" stroke="#A8916A" stroke-width="1"/>
<path d="M432 200 L432 104 C460 88 520 88 548 104 L548 200 Z" fill="#ECE3D6" stroke="#D8C9B2" stroke-width="1.8" stroke-linejoin="round"/>
<path d="M432 104 C460 88 520 88 548 104" fill="none" stroke="#D9A99F" stroke-width="5"/>
<path d="M481 118 L499 118 L495 178 L490 186 L485 178 Z" fill="#A8D5D0" stroke="#5A9A93" stroke-width="1.6" stroke-linejoin="round"/>
<path d="M200 140 L224 140 M216 133 L224 140 L216 147" fill="none" stroke="#7FB5B0" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M390 140 L414 140 M406 133 L414 140 L406 147" fill="none" stroke="#7FB5B0" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
<text x="110" y="240" font-size="14.5" font-weight="700" fill="#3A3A3A" text-anchor="middle">1 &middot; After tooth loss</text>
<text x="300" y="240" font-size="14.5" font-weight="700" fill="#3A3A3A" text-anchor="middle">2 &middot; Graft added</text>
<text x="490" y="240" font-size="14.5" font-weight="700" fill="#3A3A3A" text-anchor="middle">3 &middot; New bone</text>
</svg>
SVG;

	return isset( $d[ $name ] ) ? $d[ $name ] : '';
}
