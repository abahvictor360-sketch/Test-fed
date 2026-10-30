# HYGIE ADVANCED PROTECTION — "FIRST IMPRESSIONS"
### 30s cinematic hand-wash commercial · Seedance 2.x two-reference method · image + video prompts

---

## 1. THE IDEA

**Logline:** A nervous young candidate eats an orange in the lobby right before the biggest interview of his life. The CEO walks in with her hand out. His fingers are sticky. What follows is the most dramatic, slow-motion, *ceremonial* hand wash ever filmed — so he can give her one perfect handshake.

**Tone:** Same playbook as the coffee spot. An everyday ritual (washing your hands) shot like a luxury hypermotion product film, with deadpan Hollywood acting and a dry punchline. No music. The whole soundtrack is hyper-real ASMR foley: orange peel tearing, the Hygie pump click, the gel ribbon, the tap, the lather squelch, the bubbles popping, the water flicks. It builds up, then goes silent for the handshake.

**Why it sells the product:**
- **Clean, Care & Protect** (copy from the label) is the payoff line. The hands go from sticky to clean to a confident handshake.
- **All three variants appear.** He reaches for **Citrus**, which matches his orange sweater and the orange he was eating. **Aloe Vera** and **Original** stand next to it on the basin bar. The end frame is a three-bottle hero lineup.
- **The human truth:** first impressions start with your hands.

**Cast (from the attached photos)**
| Tag | Who | Role |
|---|---|---|
| `@ceo` | the woman in the black blazer | CEO. Composed, immaculate, unreadable |
| `@candidate` | the young man in the burnt-orange sweater | Interview candidate. Polite and nervous, a stone face that hides panic |

**Tagline (VO):** *"Hygie Advanced Protection. Clean, care and protect."*
**Slogan option:** *"First impressions start with your hands."*

---

## 2. WORKFLOW (the Higgsfield-style pipeline)

> Note: I couldn't open the Higgsfield blog link from this cloud session because `higgsfield.ai` is blocked by the network allow-list. The pipeline below follows the standard Higgsfield character, location and product reference workflow, the structure of your coffee prompt, and the **Seedance Previz Director** skill you attached. If you allow `higgsfield.ai` in the environment network settings, I can re-check the blog and line this up with it exactly.

1. **Build references (image model, e.g. Nano Banana Pro / Soul / Seedream on Higgsfield):**
   - Character sheets for `@ceo` and `@candidate`. Upload the attached photo as the face/identity reference and use the prompts in §3.
   - Location plates for `@office` and `@basin`. Prompts are in §4.
   - Product references `@hygie-citrus`, `@hygie-aloe` and `@hygie-original`. Upload your real bottle photos, then use the §5 prompts to get clean, consistent packshots.
2. **Generate start frames** for each video segment using the §6 prompts, with the references above attached.
3. **(Optional, recommended) Previz camera references.** Run the attached `seedance-previz-director` skill on a machine with Blender. It renders grey-clay MP4s of each camera move, and you attach each one as `@video1 — camera movement reference only`. The camera moves for every shot are listed in §8.
4. **Generate video in Seedance.** Use the master 30s prompt in §7A, or the split hybrid version in §7B (multishot burst plus solo hero shots), which gives better consistency.
5. **Conform** in your editor. Do sound design as written, cut 2–3 frames ahead of each foley hit, and put the VO on the end card.

**Upload order matters:** the `@image` / `@video` numbers must match the order you attach files in Seedance.

---

## 3. CHARACTER PROMPTS (image)

### `@ceo` — Character reference sheet
```
Use the uploaded photo as the exact identity reference — same face, skin tone, features, makeup and hair. Do not alter her face.

Character reference sheet of @ceo: a Black woman in her late 20s, deep brown flawless skin with a warm glow, sleek jet-black straight bob with a sharp center part falling just past the jaw, laid edges, defined arched brows, dramatic winged lashes, bronze-gold eyeshadow, glossy nude-rose lips. Small round crystal cluster stud earrings. Tailored black single-breasted blazer with sharp peak shoulders worn over a fitted white scoop-neck top. Gold link wristwatch with a cream dial on her left wrist, chunky sculpted gold dome ring on her right index finger, short glossy white manicure.

Layout: 4 panels on a seamless warm beige studio background — (1) front head-and-shoulders, neutral composed expression, (2) three-quarter view, (3) full-body standing, arms relaxed, black tailored trousers and black pointed pumps, (4) close-up of both hands showing the ring, watch and white manicure.

Personality to read in the face: calm authority, unreadable, the quiet confidence of a CEO. Soft key light from camera left, gentle fill, subtle rim light. 8K photorealistic, natural skin texture with visible pores, no retouched plastic look, no text, no watermark.
```

### `@candidate` — Character reference sheet
```
Use the uploaded photo as the exact identity reference — same face, skin tone, features and hair. Do not alter his face.

Character reference sheet of @candidate: a young Black man around 21, warm brown skin, short black hair with a clean low fade and a sharp line-up, thin light moustache and a faint chin goatee, small silver hoop earrings in both ears, calm almond eyes. Burnt-orange chunky ribbed knit crewneck sweater worn over a crisp white collared shirt with the collar points out, cuffs peeking from the sleeves. Cream / stone pleated chinos, white minimal leather sneakers.

Layout: 4 panels on a seamless mocha-brown studio background — (1) front head-and-shoulders, polite neutral expression, (2) three-quarter view, (3) full-body standing with hands in pockets, (4) close-up of both hands, clean nails, open palms toward camera.

Personality: a nervous job candidate hiding it behind a stone face — still, polite, slightly stiff posture. Soft directional window light from camera left, gentle shadow fall-off. 8K photorealistic, natural skin texture, no text, no watermark.
```

---

## 4. LOCATION PROMPTS (image)

### `@office` — Executive lobby (wide plate)
```
Wide establishing plate of @office: a minimalist luxury executive floor of a modern high-rise at morning. Floor-to-ceiling glass windows with a hazy city skyline, warm soft daylight raking across the floor. Polished warm-grey concrete floor, walls in warm beige limewash, a long low cream bouclé waiting bench with a small walnut side table holding a ceramic bowl of fresh oranges. A frosted-glass door with a slim brass handle leads to the CEO's office. Along the glass wall to the right: a sculptural travertine wash-basin bar (see @basin). Large potted olive tree and a monstera in the corner. Palette: warm beige, cream, travertine, walnut, brushed brass — with small accents of orange, green and blue. Empty of people. 8K photorealistic architectural photography, 35mm, eye-level, soft natural shadows, no text, no logos except product bottles.
```

### `@basin` — Travertine wash-basin bar (detail plate)
```
Detail plate of @basin inside @office: a long floating honed travertine wash-basin bar with an integrated carved stone trough sink, a single tall brushed-brass gooseneck tap, a rolled stack of white waffle hand towels in a walnut tray, and a small brass mirror on the beige limewash wall above. Standing on the travertine in a neat row, left to right: @hygie-aloe (green), @hygie-original (blue), @hygie-citrus (orange) — three identical 500ml clear PET pump bottles with royal-blue pump heads, labels facing camera, liquid glowing in the window light. A few water droplets on the stone. Soft morning daylight from the window at frame left, gentle caustic reflections from the bottles on the stone. 8K photorealistic, 50mm, eye-level, shallow depth of field, no people, no extra text.
```

---

## 5. PRODUCT PROMPTS (image)

Upload the matching real bottle photo as the product reference for each. Every product prompt includes this lock line:
> *Product must be identical to the reference: same bottle shape, same royal-blue pump with the square nozzle, same label layout and typography — hygie shield logo, "ADVANCED PROTECTION", shield with leaf icon, "CLEAN, CARE & PROTECT" bubble, variant name, "HANDWASH • ANTI-BACTERIAL". Label text sharp and legible. Do not invent new text.*

### `@hygie-citrus` (hero variant)
```
Studio packshot of @hygie-citrus: 500ml clear rounded PET pump bottle filled with translucent amber-orange hand wash, royal-blue pump head with a square spout, inner dip tube visible through the liquid. Front label: navy shield "hygie" logo, "ADVANCED PROTECTION" in white and grey, orange shield with white leaf, "CLEAN, CARE & PROTECT" bubble, an orange half, "CITRUS", "HANDWASH • ANTI-BACTERIAL". [product lock line]
Standing on a honed travertine block, backlit by warm window light so the liquid glows like honey; a fresh halved orange beside it, a single clear gel droplet on the stone. Warm beige background, soft gradient. 8K photorealistic product photography, 85mm, f/4, crisp label, glossy refractions.
```

### `@hygie-aloe`
```
Studio packshot of @hygie-aloe: 500ml clear rounded PET pump bottle filled with translucent emerald-green hand wash, royal-blue pump with square spout. Front label: navy shield "hygie" logo, "ADVANCED PROTECTION", green shield with white leaf, "CLEAN, CARE & PROTECT" bubble, aloe cubes, "ALOE VERA", "HANDWASH • ANTI-BACTERIAL". [product lock line]
Standing on a glass disc over travertine, fresh aloe vera leaves behind it, soft leaf-shadow pattern on a pale mint background, one clear gel droplet in front. 8K photorealistic product photography, 85mm, f/4.
```

### `@hygie-original`
```
Studio packshot of @hygie-original: 500ml clear rounded PET pump bottle filled with translucent aqua-blue hand wash, royal-blue pump with square spout. Front label: navy shield "hygie" logo, "ADVANCED PROTECTION", blue shield with white leaf, "CLEAN, CARE & PROTECT" bubble, a blue water drop, "ORIGINAL", "HANDWASH • ANTI-BACTERIAL", fern leaf graphic. [product lock line]
Standing on a round grey marble coaster, a few water droplets around the base, cool blue-grey background with soft mist. 8K photorealistic product photography, 85mm, f/4.
```

### `@hygie-trio` — End-card hero lineup
```
Hero end-card of @hygie-aloe, @hygie-original and @hygie-citrus standing side by side on a stepped travertine plinth — Citrus slightly forward in the center, Aloe left, Original right — labels square to camera. Each bottle backlit so the green, blue and orange liquids glow. Fresh orange half, aloe leaf and a few clear water droplets on the stone. Soft warm-beige seamless background with a gentle top-down light pool, crisp reflections. Leave clean negative space above the bottles for a logo. [product lock line] 8K photorealistic, 70mm, eye-level, f/5.6.
```

---

## 6. START-FRAME PROMPTS (image → first frame of each video segment)

Attach the character, location and product references listed in each prompt.

**SF1 — Orange macro hook (Cut 1)**
```
Extreme macro of @candidate's hands tearing open a fresh orange above his lap; the burnt-orange ribbed knit sweater cuff and white shirt cuff visible at the wrist, cream chinos below. Citrus oil mist bursting from the torn peel, backlit by window light into a glowing spray, juice beading on his fingertips. Background: soft bokeh of @office lobby. 8K photorealistic, 100mm macro, f/2, warm amber grade.
```

**SF2 — The hand (Cut 3)**
```
Medium two-shot in @office lobby: @ceo has just stepped through the frosted glass door, standing composed, her right hand extended for a handshake, gold ring and watch catching light. @candidate has half-risen from the cream bouclé bench, frozen, holding his sticky hands slightly up and away from his body, a half-peeled orange on the walnut table. Stone-faced, both of them. Morning daylight, 35mm, eye-level, 8K photorealistic.
```

**SF3 — Basin bar (Cut 5)**
```
Close medium shot over @candidate's shoulder at @basin: his sticky hand reaching toward the three Hygie bottles in a row — @hygie-aloe, @hygie-original, @hygie-citrus — fingers about to land on the Citrus pump. Brass gooseneck tap and travertine trough sink in frame. Window light from left, 50mm, f/2.8, 8K photorealistic.
```

**SF4 — The handshake (Cut 11)**
```
Locked side-profile two-shot in @office lobby, symmetrical, waist-up: @ceo (left) and @candidate (right) clasp hands in a firm handshake in the exact center of frame, framed by the frosted glass door behind. Both expressions completely neutral. Clean hands glowing in warm backlight, a faint shimmer of moisture. 50mm, f/2.8, 8K photorealistic, warm amber grade.
```

**SF5 — End card (Cut 14)** — use the `@hygie-trio` prompt above.

---

## 7. VIDEO PROMPTS (Seedance)

### 7A — MASTER PROMPT (single 30s generation, in the coffee-prompt format)

```
HYGIE HANDWASH COMMERCIAL PROMPT:

Style: 8K photorealistic cinematic commercial, hypermotion hand-wash montage. Ultra-shallow macro DOF (f/1.4), creamy bokeh, warm amber morning grade with clean accents of orange, emerald green and aqua blue from the Hygie bottles. Cine lens feel, 180° shutter motion blur. Kinetic, Edgar Wright-style editing. Speed ramps snap from fast motion to ultra slow-mo at impact points: the pump press, gel landing, water hit, lather bloom. Real physics: viscous gel, real water, real foam weight. Deadpan Hollywood acting. Characters, props, office and bottles identical in every cut; Hygie labels sharp, legible and identical to the references. Audio: NO music anywhere in the film. The entire soundtrack is hyper-real, ASMR-level sound design — orange peel tearing, citrus mist spritz, glass door swoosh, heels on concrete, pump CLICK, thick gel squelch, tap gush, water drumming in a stone trough, slick lather squish, micro bubble pops, rinse splash, towel snap — crisp, close-mic'd, frame-synced, layering louder as the cuts accelerate, then dropping to near-silent office room tone (air-con hum, distant elevator ding) at the handshake. Clean dialogue; slogan VO at the end. 24fps, no subtitles, no on-screen text except the product labels.

Characters: @ceo — Black woman, late 20s, sleek jet-black straight bob with center part, glam bronze makeup, crystal stud earrings, black tailored blazer over white top, gold watch, chunky gold ring, white manicure. Composed, unreadable, every move slow and precise. @candidate — young Black man, ~21, short black fade, thin moustache, small silver hoops, burnt-orange ribbed knit crewneck over a white collared shirt, cream chinos. Nervous job candidate hiding it behind a total stone face. He performs the hand wash with the solemn intensity of a surgeon scrubbing in: precise and ceremonial.

Scene: @office — minimalist luxury executive lobby at morning: floor-to-ceiling windows, warm beige limewash, cream bouclé bench, walnut side table with a bowl of oranges, frosted-glass CEO door. Along the glass wall, @basin — a travertine wash-basin bar with a carved stone trough, brass gooseneck tap and white waffle towels, and @hygie-aloe, @hygie-original and @hygie-citrus standing in a row.

CUT 1 (0:00–0:03) — Hook: extreme macro, ultra slow-motion. @candidate's thumbs tear into an orange; a glowing burst of citrus mist sprays toward the lens, backlit like fireworks, juice beading on his fingertips. TRANSITION: a droplet flies at the lens; the cut hides in the splash.

CUT 2 (0:03–0:05) — Speed ramp, fast slide-in from the left: medium shot of @candidate on the bench, half-peeled orange in hand, fingers sticky. The frosted door swings open and @ceo walks in, heels clicking. TRANSITION: whip-pan RIGHT following her stride.

CUT 3 (0:05–0:08) — Whip lands and decelerates into the two-shot: @ceo stops and extends her right hand for a handshake. @candidate half-rises, freezes and looks down at his glistening sticky hands. Stone faces. Total silence for one beat. @candidate, flat: "One moment." TRANSITION: crash zoom INTO his palms.

CUT 4 (0:08–0:10) — Hypermotion tracking shot at hand height: the camera races low alongside @candidate as he walks — not runs — with ceremonial calm toward @basin, hands raised like a surgeon. TRANSITION: the camera whips DOWN onto the bottles.

CUT 5 (0:10–0:12) — Enters on the same downward whip: his hand passes over @hygie-aloe and @hygie-original and lands on @hygie-citrus. Speed ramp to ultra slow-mo on the pump press: CLICK. TRANSITION: the cut rides the downward stroke.

CUT 6 (0:12–0:14) — Extreme macro, slow-motion: a thick ribbon of glowing amber-orange gel coils from the blue spout into his cupped palm, folding over itself, backlit like honey. TRANSITION: the orbit begins LEFT.

CUT 7 (0:14–0:16) — Orbiting speed ramp around both hands under the brass tap: water bursts onto the palms in slow-mo, then snaps fast as the hands rub, and a dense white lather explodes outward. TRANSITION: the orbit keeps circling left into macro.

CUT 8 (0:16–0:18) — Macro inside the lather: iridescent micro-bubbles swell and pop, catching orange and green reflections, fingers interlacing in slow motion like a ritual. Foley rises to a roar. TRANSITION: the hands snap UP out of frame.

CUT 9 (0:18–0:20) — Slow-motion rinse: clean hands rise from the stream, water sheeting off and droplets flicking toward camera, sparkling in the window light; a white waffle towel snaps across frame. TRANSITION: object wipe — the towel crosses the lens.

CUT 10 (0:20–0:21) — Quick push-in on @candidate's face: one slow, controlled exhale. Absolute stone face. TRANSITION: hard cut to silence.

CUT 11 (0:21–0:24) — THE CLIMAX: locked symmetrical side-profile two-shot. @candidate returns and offers his hand. @ceo takes it. Ultra slow-motion handshake, one firm pump, a faint shimmer of clean skin in the backlight. Every sound falls away to near-silent room tone. Hold.

CUT 12 (0:24–0:26) — Close on @ceo: she lets go, lifts her fingertips an inch toward her nose, an almost invisible eyebrow raise. Flat: "Citrus." Beat. "You're hired."

CUT 13 (0:26–0:27) — Close on @candidate, stone face cracking a millimeter, flat: "...I haven't said anything yet."

CUT 14 (0:27–0:30) — Fast deceleration push-in, landing on a low travertine-level hero shot of @hygie-citrus in the foreground with @hygie-aloe and @hygie-original behind it, a single droplet sliding down the bottle. In the creamy bokeh background @ceo walks back through the frosted door and @candidate follows, glancing at his own hands. Warm, unhurried female VO: "Hygie Advanced Protection. Clean, care and protect."
```

---

### 7B — SPLIT GENERATIONS (hybrid; recommended for best consistency)

Use the **two-reference method** from the Seedance Previz Director skill. Attach the character, location and product images, plus each segment's previz MP4 if you render one. **Keep the duration equal to the previz length.**

#### GEN 1 — Opening burst (0:00–0:08, multishot, 8s)
```
@image1 as a start frame. @image2 as the character reference for @candidate. @image3 as the character reference for @ceo. @image4 as the location reference for @office. @video1 as a camera movement reference only — it defines camera motion, not appearance.

Shot 1 (0–3s): extreme macro, ultra slow-motion — @candidate's thumbs tear into an orange, a glowing burst of backlit citrus mist sprays toward the lens, juice beading on his fingertips; a droplet hits the lens. Shot 2 (3–5s): the camera slides in fast from the left and settles on @candidate on the cream bench, half-peeled orange in hand; the frosted door swings open and @ceo walks in; the camera whips right with her stride. Shot 3 (5–8s): the whip lands and decelerates into a still two-shot — @ceo extends her right hand, @candidate half-rises and freezes, looking down at his sticky hands; one beat of silence; he says flatly, "One moment."; the camera crash-zooms into his palms on the last half second. Sound: peel tear, citrus spritz, door swoosh, heels on concrete, then dead silence, then a whoosh on the crash zoom. No music. Warm amber morning grade, photorealistic, deadpan acting. 24 fps
```

#### GEN 2 — Wash ritual burst (0:08–0:21, multishot, 13s)
```
@image1 as a start frame. @image2 as the character reference for @candidate. @image3 as the product reference for @hygie-citrus. @image4 as the location reference for @basin, with @hygie-aloe and @hygie-original standing beside @hygie-citrus. @video1–@video4 as camera movement references only, one per shot.

Shot 1 (0–2s, @video1): the camera races low at hand height beside @candidate as he walks with ceremonial calm toward the travertine basin bar, hands raised like a surgeon, then whips down onto the three Hygie bottles. Shot 2 (2–4s): his hand passes over the green and blue bottles and lands on @hygie-citrus; ramp to ultra slow-motion on the pump press. Shot 3 (4–6s): extreme macro — a thick ribbon of glowing amber-orange gel coils from the royal-blue spout into his cupped palm, backlit like honey. Shot 4 (6–8s, @video3): the camera orbits left around both hands under the brass tap; water bursts on the palms in slow-motion, then speed snaps as he rubs and a dense white lather blooms outward. Shot 5 (8–10s): macro inside the lather — iridescent micro-bubbles swell and pop, fingers interlacing in slow-motion. Shot 6 (10–12s, @video4): slow-motion rinse — clean hands rise from the stream, droplets flicking toward the lens; a white waffle towel snaps across the frame. Shot 7 (12–13s): quick push-in on @candidate's stone face, one controlled exhale. The Hygie Citrus label stays sharp, legible and identical to the reference. Sound: pump CLICK, gel squelch, tap gush, water drumming on stone, lather squish, bubble pops, rinse splash, towel snap — close-mic'd ASMR layering louder and louder, then a hard cut to silence. No music. 24 fps
```

#### GEN 3 — The handshake (0:21–0:27, solo, 6s)
```
@image1 as a start frame. @image2 as the character reference for @ceo. @image3 as the character reference for @candidate. @image4 as the location reference for @office.

Locked, symmetrical side-profile two-shot, the camera holds completely still. 0–3s: @candidate offers his hand, @ceo takes it — ultra slow-motion handshake, one firm pump, a faint shimmer of clean skin in the warm backlight. 3–5s: cut to a close-up of @ceo; she lets go, lifts her fingertips an inch toward her nose, an almost invisible eyebrow raise, and says flatly, "Citrus." A beat. "You're hired." 5–6s: cut to a close-up of @candidate, stone face cracking a millimeter: "...I haven't said anything yet." Sound: near-silent room tone, air-con hum, a distant elevator ding, clean close dialogue. Deadpan Hollywood acting, warm amber grade, photorealistic. 24 fps
```

#### GEN 4 — End card (0:27–0:30, solo, 3s)
```
@image1 as a start frame and as the product reference (@hygie-trio). @image2 as the character reference for @ceo. @image3 as the character reference for @candidate. @video1 as a camera movement reference only.

The camera pushes in fast, then decelerates smoothly and lands low at travertine level on @hygie-citrus in the foreground, with @hygie-aloe and @hygie-original glowing behind it; a single water droplet slides down the bottle; the labels are sharp, legible and face the camera exactly as the shot ends. In the creamy bokeh background, @ceo walks back through the frosted door and @candidate follows, glancing at his own hands. Warm, unhurried female VO: "Hygie Advanced Protection. Clean, care and protect." Sound: a soft whoosh into the push-in, a gentle droplet plink, quiet room tone. The camera ends locked on the bottles. 24 fps
```

---

## 8. PREVIZ CAMERA MOVES (for the Seedance Previz Director skill)

On a machine with Blender, tell Claude: *"Use seedance-previz-director to build these Hygie shots"* and paste the table. Blender isn't installed in this cloud session, so the MP4s were not rendered here.

| Shot | Dur | Camera move | Ramp preset | Gen |
|---|---|---|---|---|
| 1 Orange macro | 3s | slow macro drift in toward the hands, whip out on the last 0.5s | `exit_whip` | burst |
| 2 Bench + door | 2s | enter hot from the left, settle, then whip right | `enter_settle` → `exit_whip` | burst |
| 3 The hand | 3s | land from the whip, hold locked, crash zoom on the last 0.5s | `enter_settle` + `lens_ramp` | burst |
| 4 Walk to basin | 2s | low hand-height tracking dolly, whip down onto the bottles | `surge` → `exit_whip` | burst |
| 5 Pump press | 2s | enter on the downward whip, ramp to slow-mo on the press | `enter_settle` | burst |
| 6 Gel ribbon | 2s | near-static macro, very slow push | `drift` (floor_ramp) | burst |
| 7 Water + lather | 2s | left orbit around the hands, slow → fast snap | `slow_fast` | burst |
| 8 Bubble macro | 2s | continue the left orbit in macro, then tilt up at the exit | `drift` → `exit_whip` | burst |
| 9 Rinse | 2s | slow pull-back, towel object-wipe across the lens | `out3` | burst |
| 10 Exhale | 1s | quick push-in on the face | `in3` | burst |
| 11 Handshake | 3s | LOCKED, no movement | — | solo |
| 12–13 Dialogue | 3s | locked close-ups | — | solo |
| 14 End card | 3s | fast push-in, decelerating to land low on the trio | `fast_slow` | solo |

Kinetic grammar check: Cuts 4→5→6 CARRY downward. Cuts 7→8 CARRY in the left orbit. Cut 9→10 is an object-wipe. Cut 10→11 is the deliberate DEAD/IMPACT silence beat, which plays the same role as the coffee spot's "total stillness" cut.

---

## 9. ALT CUT-DOWN (15s social)
Cuts 1, 3, 5, 6, 7, 9, 11, 12 and 14, each trimmed by about 50%. Keep the "Citrus. You're hired." punchline and the end card. Drop the candidate's comeback line.
