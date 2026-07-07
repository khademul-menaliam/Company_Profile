# Design System Summary: AR Engineering Company Profile

This document outlines the visual guidelines, design tokens, component styling, and UX patterns extracted from the codebase. All new screens, forms, tables, and dialogs must strictly adhere to these patterns.

---

## 1. Core Visual Foundations

### Color Palette
*   **Primary Brand Colors**:
    *   **Indigo Blue**: Used for highlights, primary active states, focus rings, primary action buttons.
        *   `indigo-600` (`#4f46e5`) - Core branding & primary UI actions.
        *   `indigo-700` (`#4338ca`) - Hover states for indigo components.
        *   `indigo-500` (`#6366f1`) - Visual highlights / active states.
        *   `indigo-50` (`#e0e7ff`) - Card backgrounds (e.g., job listing cards).
    *   **Ocean Blue**: Used for strategic pillars & headers.
        *   `blue-600` (`#2563eb`) - Highlights, accents, custom lines.
        *   `blue-500` (`#3b82f6`) - Border and hover state details.
    *   **Sky Blue**: Used for contact components.
        *   `sky-50` (`#f0f9ff`) - Card background.
        *   `sky-900` (`#0c4a6e`) - Card text/headings.
        *   `btn-sky` (`#0369a1` base, `#075985` hover) - Action buttons.
*   **Accents**:
    *   **Gold / Amber**: `amber-500`/`yellow-500` (`#f59e0b`/`#eab308`, hover `#d97706`/`#ca8a04`) - For Golden Pillar card borders, warning accents, and Edit buttons.
    *   **Orange**: `#ea580c`/`#f97316` - Contact info icon highlights, orange input focus border (`focus-border-orange`).
    *   **Red**: `red-500`/`red-600` (hover `red-700`) - Delete actions, expired deadlines, error alerts.
*   **Neutrals**:
    *   **Backgrounds**: `bg-gray-50` (`#f9fafb`), `bg-gray-100` (`#f3f4f6`), `bg-white` (`#ffffff`), `bg-slate-900` (`#0f172a`), `bg-slate-50`.
    *   **Text**: `text-gray-900` (`#111827`), `text-gray-800` (`#1f2937`), `text-gray-700` (`#374151`), `text-gray-600` (`#4b5563`), `text-slate-300` (`#cbd5e1`).
    *   **Borders**: `border-gray-200` (`#e5e7eb`), `border-gray-300` (`#d1d5db`), `border-gray-400` (`#9ca3af`), `border-slate-800`.

### Typography
*   **Font Family**: `Figtree` (loaded by Tailwind's `sans` stack extension).
*   **Headings**:
    *   Main Titles (Page Level): `text-4xl md:text-5xl font-bold text-gray-900 uppercase tracking-wide` or `text-3xl md:text-5xl font-extrabold uppercase tracking-tight`.
    *   Card / Section Titles: `text-2xl font-bold uppercase tracking-wide` or `font-semibold text-xl`.
*   **Body & Helper Text**:
    *   Paragraph text: `text-gray-700 text-lg leading-relaxed text-justify` or `text-gray-600`.
    *   Helper / Small text: `text-sm text-gray-500` or `text-xs`.

### Spacing & Grid System
*   **Containers**: Standard page wrapper is `container mx-auto px-4 max-w-6xl` or `max-w-5xl`.
*   **Section Spacing**: Large sections use vertical padding `py-12`, `py-16`, or `py-24`.
*   **Component Spacing**: Grid structures use `gap-8 lg:gap-12`. Form vertical stack spacing uses `space-y-5` or `space-y-6`. Form row layout is typically `grid md:grid-cols-2 gap-6 mb-4`.
*   **Inside Elements**: Cards/boxes use padding `p-6` to `p-8` (often scaled, e.g., `p-6 sm:p-8 lg:p-10`).

### Border Radius
*   **Buttons & Form Inputs**: `rounded-lg` (8px) or `rounded-md` (6px).
*   **Standard Cards**: `rounded-xl` (12px) or `rounded-2xl` (16px).
*   **Tables**: `rounded-lg` (8px) (wrapper & table components).
*   **Badges & Small Details**: `rounded-full` (pills).

### Shadows & Depth
*   **Form & Detail Cards**: `shadow-md` or `shadow-xl`.
*   **Dropdown Menu / Overlays**: `shadow-2xl shadow-slate-900/40` or `shadow-2xl`.
*   **Interactive Hover State**: Cards shadow upgrades to `hover:shadow-xl` or transitions with custom shadows like `box-shadow: 0 0 20px rgba(55, 65, 81, 0.4), 0 20px 25px -5px rgba(0, 0, 0, 0.1)`.

---

## 2. Component Layouts & Styles

### Button Styles
*   **Primary Call-to-Action (Breeze Standard)**:
    `inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150`
*   **Primary Brand Action (Indigo)**:
    `w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700 transition duration-300 shadow-lg` (or `px-6 py-2.5 shadow-md hover:shadow-lg`).
*   **Secondary Action (Breeze Standard)**:
    `inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition`
*   **Accent Buttons**:
    *   **Sky Blue (`btn-sky`)**: `background-color: #0369a1` (hover `#075985`), py-3, rounded-xl.
    *   **Edit Button**: `bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition`
    *   **View Button**: `bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition`
    *   **Delete Button**: `bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition`

### Form Styles
*   **Layout**: Single column or standard 2-column grid using `grid md:grid-cols-2 gap-6 mb-4`.
*   **Label Style**: `block text-sm font-semibold mb-1 text-gray-700` or `block font-bold mb-1 text-gray-800`.
*   **Input Fields (Text, Email, Select)**:
    *   Standard Input: `w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-200 outline-none`
    *   Contact Input: `w-full border-2 border-gray-400 rounded-xl p-3 focus-border-orange focus:ring-0 transition-all duration-300` (custom class `.focus-border-orange:focus { border-color: #ea580c; outline: none; }`).
*   **File Input**:
    `w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100`

### Card Layouts
*   **Standard Content Card**: `bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300`.
*   **Job Listing Card**: `bg-indigo-50 border-l-4 border-indigo-500 rounded-xl shadow-md p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between`. Contains a header with a right-aligned rounded-full badge (`text-xs font-bold bg-indigo-600 text-white px-3 py-1 rounded-full uppercase tracking-wider whitespace-nowrap`).
*   **Strategic Pillar Card**: `pillar-card bg-white shadow-sm p-8 rounded-2xl` with a border expansion transition matching the height/width of the card container on hover.

### Modal & Dialog Patterns
*   **Wrapper**: Alpine.js conditional render `x-show="show"`.
*   **Backdrop**: Backdrop overlay with `fixed inset-0 bg-gray-500 opacity-75` or `bg-slate-900/60 backdrop-blur-sm z-40`.
*   **Window Container**: Centered rounded-lg window with dynamic sizing class:
    `mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto max-w-2xl`
*   **Transitions**:
    *   Backdrop: `x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"`
    *   Body: `x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"`

### Icons
*   **Font Awesome**: Integrated via CDN. Icons used as inline tags inside links, card details, page settings: `<i class="fas fa-map-marker-alt mr-2"></i>`, `<i class="fas fa-calendar-day mr-2"></i>`, `<i class="fas fa-briefcase"></i>`.
*   **Inline SVG**: Used for navigation arrows, strategic indicators, or social media links (custom filled colors like `#1877F2` for Facebook, `#0A66C2` for LinkedIn, and `bg-black` for X).

### Table Styles
*   **Container**: `overflow-x-auto` wrapper to guarantee small-screen scrolling.
*   **Header row**: `bg-gray-100 text-left text-gray-700 font-semibold border-b` with cells using `py-3 px-4`.
*   **Body row**: `hover:bg-gray-50 transition-colors` with borders `border-b border-gray-200` on cells.

### Navigation Patterns
*   **Desktop Nav Links**: Horizontal, text with underline/underline animation:
    `<span class="absolute bottom-0 left-0 w-full h-[2px] bg-indigo-600 transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100"></span>`.
*   **Desktop Download Button**: Premium pill/button styled with absolute gradient overlays:
    `group relative px-6 py-2.5 font-bold text-white rounded-lg overflow-hidden shadow-md bg-indigo-600 border border-indigo-500/50 hover:shadow-lg hover:shadow-indigo-500/40 transition-all duration-300`.
*   **Desktop Dropdown**: Triggered on hover/click:
    `bg-slate-900 shadow-2xl shadow-slate-900/40 rounded-xl border border-slate-800 overflow-hidden py-2 text-slate-300` positioned at `absolute top-full left-1/2 -translate-x-1/2 pt-4 w-56 z-50`.
*   **Mobile Sidebar**: Backdrop overlay and an off-canvas drawer sliding from the right:
    `fixed top-0 right-0 w-full max-w-sm h-full bg-white shadow-2xl z-50 overflow-y-auto flex flex-col border-l border-slate-200`.

### Responsive & Adaptive Layouts
*   **Grids**: Grid systems typically stack on mobile: `grid grid-cols-1 md:grid-cols-2` or `grid grid-cols-1 md:grid-cols-3`.
*   **Header Font Scaling**: Large titles use responsive Tailwind sizes: `text-4xl md:text-5xl` or `text-3xl md:text-5xl`.
*   **Main Wrapper Top Padding**: To accommodate a fixed transparent-to-solid navbar, the main element uses `pt-24`.

### Animations & Transitions
*   **Hover states**: Smooth transition properties `transition-all duration-300` or `transition ease-in-out duration-150`.
*   **Translations on hover**: Uplift offset classes: `hover:-translate-y-1` or `transform: translateY(-8px)` for extreme hover states.
*   **Menu toggles**: Slide & opacity transitions leveraging AlpineJS values:
    *   Fade: `opacity-0` -> `opacity-100`.
    *   Slide: `translate-x-full` -> `translate-x-0`.

---

## 3. UI/UX States & Feedback

### Empty States
*   **Listings & Jobs Empty State**:
    Centered content block containing:
    1.  Large icon in light blue-indigo: `text-indigo-200 text-6xl mb-4` inside an icon wrapper.
    2.  Semi-bold dark text: `text-gray-500 text-xl font-medium`.
    3.  Lighter description: `text-gray-400`.
*   **Table Empty State**:
    Row span with italicized center text:
    `<td colspan="X" class="text-center py-6 text-gray-500 italic">No records found</td>`

### Error Handling & Validation
*   **Single Input Error**: Small, block-level red warning under input:
    `<small class="text-red-600 mt-1 block">{{ $message }}</small>`
*   **Form Validation Box**:
    Red alert box placed above forms:
    `bg-red-100 text-red-700 p-4 mb-6 rounded` containing a bullets list (`list-disc pl-5`).
*   **Global Error Banner**:
    Red alert banner with border highlights:
    `bg-red-100 text-red-700 p-4 rounded-lg mb-6 border border-red-200`

### Success Messages
*   **Simple Alerts**: Green-colored block:
    `bg-green-100 text-green-800 p-3 rounded mb-4`
*   **Form Submission Banner**: Green alert container with border framing:
    `bg-green-100 text-green-700 p-4 rounded-lg mb-6 border border-green-200`

---

## 4. Google Stitch Prompt

```text
Create a Tailwind CSS component design system recreation for AR Engineering.
The primary branding revolves around an industrial, engineering aesthetic using high-contrast neutrals, deep indigos, and corporate blues.
Recreate the following tokens and styles:
- Colors: Primary brand is Indigo (#4f46e5 as indigo-600, #4338ca as indigo-700). Secondary accent is Blue (#2563eb as blue-600). Accent highlight is Yellow-Gold (#f59e0b). Light backgrounds use Gray-50 (#f9fafb) and White (#ffffff). Dark overlays and sidebars use Slate-900 (#0f172a).
- Typography: Setup the typography system using Figtree / Sans font families. Large headers are text-4xl/5xl, uppercase, with tracking-wide. Section/card headers are text-xl/2xl, bold. Body is text-gray-700, leading-relaxed, text-justify.
- Borders & Corners: Input elements and primary buttons use rounded-lg (8px). Content cards and strategic cards use rounded-xl (12px) and rounded-2xl (16px). Table elements are enclosed inside rounded-lg border-gray-200.
- Buttons: Recreate (1) Primary button: bg-gray-800, white uppercase tracking-widest text-xs font-semibold, hover:bg-gray-700, rounded-md; (2) Brand button: bg-indigo-600, white bold text, rounded-lg, shadow-md, hover:bg-indigo-700, hover:shadow-lg, transition duration-300; (3) Secondary button: bg-white, border-gray-300, gray-700 bold text-xs, shadow-sm, hover:bg-gray-50; (4) Action buttons in Yellow-500 (edit), Blue-500 (view), and Red-600 (delete).
- Cards: Recreate (1) Hover-translate card: bg-white, rounded-xl, shadow-md, hover:shadow-xl, hover:-translate-y-1, transition duration-300; (2) Accent card: bg-indigo-50, border-l-4 border-indigo-500, rounded-xl, shadow-md; (3) Strategic card: border-2 border-gray-100, custom expanding hover border in blue-600 using pseudo-elements with clip-path transitions.
- Tables: Header row bg-gray-100, bold gray-700, cell padding py-3 px-4, borders border-b border-gray-200. Body row hover bg-gray-50 transition.
- Forms: Fields use rounded-lg or rounded-xl borders in border-gray-300 or border-gray-400. Focus transitions to focus:ring-2 focus:ring-indigo-200 or custom orange focus (focus-border-orange: border-color #ea580c, ring-0).
- Notifications & States: Recreate the green success banner (bg-green-100 text-green-700, rounded-lg, border border-green-200) and the red validation box (bg-red-100 text-red-700, rounded-lg, border border-red-200) with proper layout spacing. Empty state displays a large centrated icon in indigo-200 and text in gray-500.
Ensure all generated outputs are fully responsive, clean, and use correct Tailwind CSS utility class combinations.
```

---

## 5. Screen Creation Prompt: Confirmation & Update Screen

```text
Create a new Confirmation & Update Screen for AR Engineering that matches the visual consistency of the existing application.
The screen should be constructed using the following specifications:
1. Layout Structure:
   - Wrap the page in a gray background `@extends('layouts.app')` template. The container is a centered content box: `container mx-auto max-w-2xl px-4 py-12`.
   - The body is a card layout: `bg-white shadow-md rounded-xl p-8 border-t-4 border-indigo-600 flex flex-col`.
2. Header Section:
   - Icon: A large animated green check circle icon at the top center. Use Font Awesome `<i class="fas fa-check-circle text-green-500 text-6xl mb-4"></i>`.
   - Title: `text-3xl font-bold text-gray-900 mb-2 uppercase tracking-wide text-center`. Value: "Update Successful".
   - Subtitle: `text-sm text-gray-500 text-center mb-6`. Value: "Your changes have been saved and applied."
3. Details & Confirmation Data Grid:
   - Provide a review panel for updated settings/fields inside a gray inset container: `bg-gray-50 rounded-lg p-6 border border-gray-200 space-y-4 text-left`.
   - Each line item uses a flex layout: `flex justify-between items-center py-2 border-b border-gray-200 last:border-b-0`.
   - Label style: `text-sm font-semibold text-gray-600`.
   - Value style: `text-sm font-bold text-gray-800`.
   - Include sample line items (e.g., "Updated By", "Time of Update", "Status" with green badge `px-2 py-0.5 text-xs bg-green-100 text-green-700 rounded-full font-semibold`).
4. Feedback Banners:
   - Add a success notification banner at the top of the card if updated successfully: `bg-green-100 text-green-700 p-4 rounded-lg mb-6 border border-green-200 text-sm font-medium`.
5. Action Buttons:
   - Include a double-button control layout at the bottom: `flex flex-col sm:flex-row gap-4 pt-6 mt-6 border-t border-gray-100`.
   - Confirm/Return Button: `w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700 transition duration-300 shadow-md text-center uppercase tracking-wider text-xs`.
   - Cancel/Secondary Button: `w-full bg-white border border-gray-300 text-gray-700 font-semibold py-3 rounded-lg hover:bg-gray-50 transition duration-300 text-center uppercase tracking-wider text-xs`.
6. Styling & Typography:
   - Ensure the font stack is Figtree/sans-serif.
   - Text colors must align perfectly: headers in gray-900, secondary text in gray-600, labels in gray-600.
```
