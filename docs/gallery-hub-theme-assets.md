Root for theme mosaics: `home_directory/public_html/assets/gallery/`

Theme feature pages (`/gallery/exteriors`, etc.) use **`thumb/` only** for listing. The mosaic uses the **basename** as the label; the lightbox loads **`full/{same basename}`** when that file exists (otherwise the thumb URL).

**Gallery & Awards hub** theme tiles use fixed files under `public_html/assets/img/gallery-awards-ctas/` (see `gallery-awards.php`), same area as homepage slider assets (`assets/img/featured-slider/`, etc.).

---

**Exteriors**

```
public_html/assets/gallery/exteriors/
  full/
    001-hero-front-elevation.avif
    002-side-garden.avif
  thumb/
    001-hero-front-elevation.avif
    002-side-garden.avif
```

---

**Interiors**

```
public_html/assets/gallery/interiors/
  full/
    001-open-plan-living.avif
    010-kitchen-island.webp
  thumb/
    001-open-plan-living.avif
    010-kitchen-island.webp
```

---

**Finishes**

```
public_html/assets/gallery/finishes/
  full/
    001-featured-tile-detail.avif
    002-cabinet-hardware.webp
  thumb/
    001-featured-tile-detail.avif
    002-cabinet-hardware.webp
```

---

**During construction** (folder name must match URL segment)

```
public_html/assets/gallery/during-construction/
  full/
    001-roof-trusses.avif
    002-concrete-pour.webp
  thumb/
    001-roof-trusses.avif
    002-concrete-pour.webp
```

---

**Project gallery** (`assets/gallery/projects/{slug}/` — optional `captions.json` still supported here)

```
public_html/assets/gallery/projects/noordhoek-ridge/
  captions.json
  full/
    001-hero.avif
  thumb/
    001-hero.avif
```

```json
{
  "001-hero.avif": "Dusk shot from the driveway."
}
```

```
public_html/assets/gallery/projects/simonstown-waterfront/
  001-approach.avif
  002-entry-hall.webp
```

---

**Gallery & Awards hub — theme CTA images (static paths in `gallery-awards.php`)**

```
public_html/assets/img/gallery-awards-ctas/
  exteriors.avif
  interiors.avif
  finishes.avif
  during-construction.avif
```

---

**More filename examples (`NNN-name.ext`)**

```
005-before-renovation.jpg
012-master-bath-detail.avif
030-kitchen-wide-shot.avif
100-drone-north.webp
```
