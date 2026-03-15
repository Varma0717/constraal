# Constraal Website - UX Wireframe Map

## Site Navigation Architecture

```
┌─────────────────────────────────────────────────────────────────┐
│                      MAIN NAVIGATION HUB                         │
├─────────────────────────────────────────────────────────────────┤
│  Home → Technology → Robotics → Home Systems → Appliances      │
│         ↓            ↓           ↓              ↓                │
│     +Safety     +Research   +Design      +Integration         │
│                                                                  │
│  Safety → About → Careers → Contact (Admin Dashboard)          │
└─────────────────────────────────────────────────────────────────┘
```

---

## Page Wireframes

### 1. HOME PAGE (Landing & Value Proposition)

**Desktop Layout (1920px):**

```
┌─────────────────────────────────────────────────────────────────┐
│ HEADER: Logo | Nav Links (9) | Careers Button                   │
├─────────────────────────────────────────────────────────────────┤
│                                                                   │
│ ┌─────────────────────────────────────────────────────────────┐ │
│ │                      HERO SECTION                            │ │
│ │  "Intelligent Robotics for the Modern Home"                 │ │
│ │  [Explore Technology] [Join Early Updates]                  │ │
│ │                                                              │ │
│ │                    [Hero Image/Video]                       │ │
│ └─────────────────────────────────────────────────────────────┘ │
│                                                                   │
│ ┌─────────────────────────────────────────────────────────────┐ │
│ │ SECTION: Future of the Home                                │ │
│ │  └─ [Card] Human-Aware Systems                             │ │
│ │  └─ [Card] Reliable Automation                             │ │
│ └─────────────────────────────────────────────────────────────┘ │
│                                                                   │
│ ┌─────────────────────────────────────────────────────────────┐ │
│ │ SECTION: Technology Core (4 Pillars Grid)                  │ │
│ │  ┌─────────────┐ ┌─────────────┐ ┌─────────────┐           │ │
│ │  │ Embedded    │ │ Human-Aware │ │ Safe        │ ┌────┐    │ │
│ │  │ Intelligence│ │ Robotics    │ │ Interaction │ │    │    │ │
│ │  └─────────────┘ └─────────────┘ └─────────────┘ └────┘    │ │
│ │                                                              │ │
│ │  ┌──────────────────────────────────────────────┐           │ │
│ │  │ Energy Efficiency & Sustainability           │           │ │
│ │  └──────────────────────────────────────────────┘           │ │
│ └─────────────────────────────────────────────────────────────┘ │
│                                                                   │
│ ┌─────────────────────────────────────────────────────────────┐ │
│ │ SECTION: Where Technology Lives (3 Division Cards)         │ │
│ │  ┌─────────────┐ ┌─────────────┐ ┌─────────────┐           │ │
│ │  │ Robotics    │ │ Home        │ │ Appliances  │           │ │
│ │  │ [Arrow]     │ │ Systems     │ │ [Arrow]     │           │ │
│ │  │ /robotics   │ │ [Arrow]     │ │ /appliances │           │ │
│ │  │             │ │ /homesystems│ │             │           │ │
│ │  └─────────────┘ └─────────────┘ └─────────────┘           │ │
│ └─────────────────────────────────────────────────────────────┘ │
│                                                                   │
│ ┌─────────────────────────────────────────────────────────────┐ │
│ │ SECTION: Safety & Trust (Muted Background)                 │ │
│ │  Description + 4 Trust Value Cards                          │ │
│ └─────────────────────────────────────────────────────────────┘ │
│                                                                   │
│ ┌─────────────────────────────────────────────────────────────┐ │
│ │ SECTION: Built by Engineers (Muted Background)             │ │
│ │  3 Research Cards + Long-term Commitment Message            │ │
│ └─────────────────────────────────────────────────────────────┘ │
│                                                                   │
│ ┌─────────────────────────────────────────────────────────────┐ │
│ │ FINAL CTA BAND (Blue Background)                            │ │
│ │  [Join Early Updates] [Partner] [Careers]                   │ │
│ └─────────────────────────────────────────────────────────────┘ │
│                                                                   │
├─────────────────────────────────────────────────────────────────┤
│ FOOTER: 4 Column Layout - Company | Divisions | Focus | Contact │
└─────────────────────────────────────────────────────────────────┘
```

**Mobile Layout (375px):**

```
┌──────────────────────────┐
│ Logo | [Menu Button]     │
├──────────────────────────┤
│                          │
│ HERO SECTION             │
│ "Intelligent Robotics... │
│ (Stack on mobile)        │
│ [Explore Tech]           │
│ [Early Updates]          │
│ [Hero Image Stacked]     │
│                          │
├──────────────────────────┤
│ Future of Home           │
│ [Card]                   │
│ [Card]                   │
│                          │
├──────────────────────────┤
│ Technology Core          │
│ (Stacked 1 col)          │
│ [Pillar Card]            │
│ [Pillar Card]            │
│ [Pillar Card]            │
│ [Pillar Card]            │
│                          │
├──────────────────────────┤
│ Where Technology Lives   │
│ [Card Stacked]           │
│ [Card Stacked]           │
│ [Card Stacked]           │
│                          │
├──────────────────────────┤
│ Safety & Trust           │
│ [Content Stacked]        │
│                          │
├──────────────────────────┤
│ Built by Engineers       │
│ [Content Stacked]        │
│                          │
├──────────────────────────┤
│ FINAL CTA BAND           │
│ [Stacked Buttons]        │
│                          │
├──────────────────────────┤
│ FOOTER                   │
│ (1 Column Layout)        │
│ - Company                │
│ - Divisions              │
│ - Focus Areas            │
│ - Contact                │
└──────────────────────────┘
```

---

### 2. TECHNOLOGY PAGE (Core Platform)

**Desktop Layout:**

```
┌──────────────────────────────────────────────────────┐
│ HEADER                                                │
├──────────────────────────────────────────────────────┤
│                                                       │
│ PAGE HERO                                            │
│ "Core Technology Platform"                          │
│ Description                                          │
│                                                       │
├──────────────────────────────────────────────────────┤
│ SECTION: Embedded Systems (3 Cards)                 │
│  ┌──────┐ ┌──────┐ ┌──────┐                         │
│  │ RT   │ │ Power│ │ Modular│                       │
│  │ Proc │ │ Opt  │ │ Control│                       │
│  └──────┘ └──────┘ └──────┘                         │
├──────────────────────────────────────────────────────┤
│ SECTION: Sensor Processing (3 Cards - NEW)          │
│  ┌──────┐ ┌──────┐ ┌──────┐                         │
│  │Vision│ │Enviro│ │ Edge │                         │
│  │Depth │ │Sense │ │Fusion│                         │
│  └──────┘ └──────┘ └──────┘                         │
├──────────────────────────────────────────────────────┤
│ SECTION: On-Device Intelligence (Checklist)         │
│  ✓ On-device vision processing                      │
│  ✓ Real-time sensor interpretation                  │
│  ✓ Privacy-first machine learning                   │
│  ✓ Secure update mechanisms                         │
├──────────────────────────────────────────────────────┤
│ SECTION: Control Systems (2 Cards)                  │
│  ┌──────────────────┐ ┌──────────────┐              │
│  │ Local Control    │ │ System       │              │
│  │ Loops            │ │ Integration  │              │
│  └──────────────────┘ └──────────────┘              │
├──────────────────────────────────────────────────────┤
│ SECTION: Platform Integration (2 Cards - NEW)       │
│  ┌──────────────────┐ ┌──────────────┐              │
│  │ Shared Intel     │ │ Secure       │              │
│  │ Layer            │ │ Coordination │              │
│  └──────────────────┘ └──────────────┘              │
├──────────────────────────────────────────────────────┤
│ SECTION: Safety & Security (4 Cards - Muted BG)    │
│  ┌──────┐ ┌──────┐ ┌──────┐ ┌──────┐               │
│  │Secure│ │Encrypt│ │Access│ │Rapid │               │
│  │ Boot │ │ion    │ │Control│ │Resp  │               │
│  └──────┘ └──────┘ └──────┘ └──────┘               │
├──────────────────────────────────────────────────────┤
│ SECTION: Active Research (3 Cards)                  │
│  ┌──────────────────────────────────────────┐       │
│  │ Sensor Processing | Human Interaction    │       │
│  │ System Reliability                       │       │
│  └──────────────────────────────────────────┘       │
│                                                       │
├──────────────────────────────────────────────────────┤
│ CTA BAND: "Explore Our Robotics Work" → /robotics   │
├──────────────────────────────────────────────────────┤
│ FOOTER                                                │
└──────────────────────────────────────────────────────┘
```

---

### 3. ROBOTICS PAGE (Hardware & Research)

**Desktop Layout:**

```
┌──────────────────────────────────────────────────────┐
│ HEADER                                                │
├──────────────────────────────────────────────────────┤
│                                                       │
│ PAGE HERO                                            │
│ "Home Robotics, Built for Trust"                    │
│ Safe, predictable behavior in living spaces         │
│                                                       │
├──────────────────────────────────────────────────────┤
│ SECTION: Core Capabilities (4 Cards)                │
│  ┌──────┐ ┌──────┐ ┌──────┐ ┌──────┐               │
│  │Auto  │ │Percep│ │Manip │ │Human │               │
│  │Navig │ │tion  │ │ulate │ │Interact│            │
│  └──────┘ └──────┘ └──────┘ └──────┘               │
├──────────────────────────────────────────────────────┤
│ SECTION: Future Assistance Platforms (3 Cards - NEW)│
│  ┌──────────────────┐ ┌──────────────┐              │
│  │ Home Assistance  │ │ Context      │              │
│  │ Services         │ │ Awareness    │              │
│  ├──────────────────┤ ├──────────────┤              │
│  │ Trust by Design  │                               │
│  └──────────────────┘                               │
├──────────────────────────────────────────────────────┤
│ SECTION: Development Status (3 Cards - Muted BG)   │
│  ┌──────┐ ┌──────────┐ ┌──────────┐                │
│  │Res.  │ │ Prototype│ │Validation│                │
│  │      │ │ Systems  │ │Testing   │                │
│  └──────┘ └──────────┘ └──────────┘                │
├──────────────────────────────────────────────────────┤
│ SECTION: Design Philosophy                          │
│ Transparent, Predictable, Reliable                  │
│ (Text + Values explanation)                         │
│                                                       │
├──────────────────────────────────────────────────────┤
│ CTA BAND: "Join Our Robotics Team" → /careers       │
├──────────────────────────────────────────────────────┤
│ FOOTER                                                │
└──────────────────────────────────────────────────────┘
```

---

### 4. HOME SYSTEMS PAGE (Smart Home Coordination)

**Desktop Layout:**

```
┌──────────────────────────────────────────────────────┐
│ HEADER                                                │
├──────────────────────────────────────────────────────┤
│                                                       │
│ PAGE HERO                                            │
│ "Home Operations Coordination Layer"                │
│                                                       │
├──────────────────────────────────────────────────────┤
│ SECTION: Overview                                   │
│ Orchestrates robotics + appliances + environment   │
│                                                       │
├──────────────────────────────────────────────────────┤
│ SECTION: Core Systems (4 Cards - 2x2 Grid)         │
│  ┌───────────────┐ ┌───────────────┐                │
│  │ Climate       │ │ Lighting &    │                │
│  │ Control       │ │ Ambiance      │                │
│  ├───────────────┤ ├───────────────┤                │
│  │ Security &    │ │ Energy        │                │
│  │ Monitoring    │ │ Management    │                │
│  └───────────────┘ └───────────────┘                │
├──────────────────────────────────────────────────────┤
│ SECTION: Home Operations Layer (3 Cards - Muted)   │
│  ┌──────────┐ ┌──────────┐ ┌──────────┐            │
│  │ Zoning & │ │ Team     │ │ Clear    │            │
│  │ Modes    │ │ Console  │ │ Controls │            │
│  └──────────┘ └──────────┘ └──────────┘            │
├──────────────────────────────────────────────────────┤
│ SECTION: User Experience                            │
│  • Mobile App - Remote access & automation          │
│  • Voice Control - Natural language commands        │
│  • Physical Controls - Reliable hardware buttons    │
│                                                       │
├──────────────────────────────────────────────────────┤
│ CTA BAND: "Explore Appliance Integration"           │
├──────────────────────────────────────────────────────┤
│ FOOTER                                                │
└──────────────────────────────────────────────────────┘
```

---

### 5. APPLIANCES PAGE (Intelligent Appliances)

**Desktop Layout:**

```
┌──────────────────────────────────────────────────────┐
│ HEADER                                                │
├──────────────────────────────────────────────────────┤
│                                                       │
│ PAGE HERO                                            │
│ "Intelligent Appliances Ecosystem"                  │
│                                                       │
├──────────────────────────────────────────────────────┤
│ SECTION: Kitchen Systems (4 Cards)                  │
│  ┌──────┐ ┌──────┐ ┌──────┐ ┌──────┐               │
│  │Effi. │ │Min.  │ │System│ │Relia│                │
│  │      │ │Inter │ │Aware │ │bility│               │
│  └──────┘ └──────┘ └──────┘ └──────┘               │
├──────────────────────────────────────────────────────┤
│ SECTION: Laundry & Care (Muted BG)                 │
│  ✓ Adaptive washing cycles for fabric types         │
│  ✓ Energy-aware scheduling & optimization           │
│  ✓ Minimal user prompts and setup                   │
│  ✓ Forever serviceability & upgradeable parts       │
├──────────────────────────────────────────────────────┤
│ SECTION: Integration                                │
│ All systems coordinate through Home Systems         │
│ [Link to /homesystems]                              │
│                                                       │
├──────────────────────────────────────────────────────┤
│ FOOTER                                                │
└──────────────────────────────────────────────────────┘
```

---

### 6. SAFETY PAGE (Engineering & Standards)

**Desktop Layout:**

```
┌──────────────────────────────────────────────────────┐
│ HEADER                                                │
├──────────────────────────────────────────────────────┤
│                                                       │
│ PAGE HERO                                            │
│ "Safety & Reliability"                              │
│ Multi-layer fail-safes and human-centric design    │
│                                                       │
├──────────────────────────────────────────────────────┤
│ SECTION: Safety-First Engineering (4 Cards)        │
│  ┌──────────┐ ┌──────────┐ ┌──────────┐            │
│  │Predictab.│ │Transparent│ │Human     │            │
│  │          │ │          │ │ Authority│            │
│  ├──────────┤ ├──────────┤ ├──────────┤            │
│  │Resilience│                                       │
│  └──────────┘                                       │
├──────────────────────────────────────────────────────┤
│ SECTION: Human Interaction Standards (Muted BG)    │
│  ┌──────────────┐ ┌──────────────┐                  │
│  │ Human-Aware  │ │ Force         │                  │
│  │ Motion       │ │ Limiting      │                  │
│  ├──────────────┤ ├──────────────┤                  │
│  │ Emergency Controls             │                  │
│  └──────────────────────────────┘                   │
├──────────────────────────────────────────────────────┤
│ SECTION: Fail-Safe & Redundancy                     │
│  • Fail-Safe States - Systems default to safe state│
│  • Defense in Depth - Multiple layers of protection│
│  • Continuous Monitoring - Real-time supervision   │
├──────────────────────────────────────────────────────┤
│ SECTION: Privacy & Reliability (Muted BG)          │
│  ┌────────────────────┐ ┌────────────────┐          │
│  │ Local-First        │ │ Security by    │          │
│  │ Control            │ │ Design         │          │
│  └────────────────────┘ └────────────────┘          │
│                                                       │
├──────────────────────────────────────────────────────┤
│ FOOTER                                                │
└──────────────────────────────────────────────────────┘
```

---

### 7. ABOUT PAGE (Company Mission & Values)

**Desktop Layout:**

```
┌──────────────────────────────────────────────────────┐
│ HEADER                                                │
├──────────────────────────────────────────────────────┤
│                                                       │
│ PAGE HERO                                            │
│ "About Constraal"                                   │
│                                                       │
├──────────────────────────────────────────────────────┤
│ SECTION: Mission                                    │
│ "Advance intelligent robotics and automation..."   │
│                                                       │
├──────────────────────────────────────────────────────┤
│ SECTION: Journey                                    │
│ (Story of founding and growth)                      │
│                                                       │
├──────────────────────────────────────────────────────┤
│ SECTION: Our Values (4 Cards - Muted BG)          │
│  ┌──────────┐ ┌──────────┐ ┌──────────┐            │
│  │Safety    │ │Engineering│ │Human-    │            │
│  │First     │ │Excellence │ │Centered  │            │
│  ├──────────┤ ├──────────┤ ├──────────┤            │
│  │Long-Term │                                       │
│  │Thinking  │                                       │
│  └──────────┘                                       │
├──────────────────────────────────────────────────────┤
│ SECTION: Team                                        │
│ Description of collaborative culture & expertise    │
│                                                       │
├──────────────────────────────────────────────────────┤
│ CTA BAND: "Join Our Team" → /careers                │
├──────────────────────────────────────────────────────┤
│ FOOTER                                                │
└──────────────────────────────────────────────────────┘
```

---

### 8. CAREERS PAGE (Recruitment & Culture)

**Desktop Layout:**

```
┌──────────────────────────────────────────────────────┐
│ HEADER                                                │
├──────────────────────────────────────────────────────┤
│                                                       │
│ PAGE HERO                                            │
│ "Build the Future with Constraal"                   │
│                                                       │
├──────────────────────────────────────────────────────┤
│ SECTION: Why Constraal (4 Cards)                   │
│  ┌──────────┐ ┌──────────┐ ┌──────────┐            │
│  │Technical │ │Impact    │ │Autonomy  │            │
│  │Excellence│ │          │ │          │            │
│  ├──────────┤ ├──────────┤ ├──────────┤            │
│  │Safety First│                                     │
│  └──────────┘                                       │
├──────────────────────────────────────────────────────┤
│ SECTION: Role Categories (4 Cards - NEW)           │
│  ┌──────────────┐ ┌──────────────┐                  │
│  │ Robotics     │ │ Embedded     │                  │
│  │ Research     │ │ Systems      │                  │
│  │ & Design     │ │ Engineering  │                  │
│  ├──────────────┤ ├──────────────┤                  │
│  │ Software     │ │ Systems      │                  │
│  │ Engineers    │ │ Architecture │                  │
│  └──────────────┘ └──────────────┘                  │
├──────────────────────────────────────────────────────┤
│ SECTION: Open Positions (Dynamic List)              │
│  [Job Card 1] [Apply Button]                        │
│  [Job Card 2] [Apply Button]                        │
│  [Job Card 3] [Apply Button]                        │
│  ...                                                 │
├──────────────────────────────────────────────────────┤
│ SECTION: What to Expect (4 Items - Muted BG)      │
│  → Hard Problems to Solve                           │
│  → Collaborative Engineering Culture                │
│  → Continuous Learning & Growth                     │
│  → Work-Life Balance & Benefits                     │
├──────────────────────────────────────────────────────┤
│ SECTION: Contact / Questions                        │
│  Email: careers@constraal.com                       │
│  [Contact Form Link]                                │
│                                                       │
├──────────────────────────────────────────────────────┤
│ FOOTER                                                │
└──────────────────────────────────────────────────────┘
```

---

### 9. CONTACT PAGE (Inquiries & Newsletter)

**Desktop Layout:**

```
┌──────────────────────────────────────────────────────┐
│ HEADER                                                │
├──────────────────────────────────────────────────────┤
│                                                       │
│ PAGE HERO                                            │
│ "Get in Touch"                                      │
│                                                       │
├──────────────────────────────────────────────────────┤
│                                                       │
│ ┌─────────────────────────────────────────────────┐ │
│ │ CONTACT FORM (Left 2/3)        │ INFO (Right 1/3)│
│ │ Name [input]                   │ ┌─────────────┐│
│ │ Email [input]                  │ │ Ways to     ││
│ │ Company [input]                │ │ Reach Us    ││
│ │ Type [dropdown]:               │ ├─────────────┤│
│ │  - General Inquiry             │ │General      ││
│ │  - Partnership                 │ │Partner      ││
│ │  - Press                       │ │Press        ││
│ │  - Early Interest              │ └─────────────┘│
│ │ Message [textarea]             │                │
│ │                                │ ┌─────────────┐│
│ │ [Submit Button]                │ │ Early       ││
│ │                                │ │ Updates     ││
│ │                                │ │ Newsletter  ││
│ │                                │ └─────────────┘│
│ │                                │                │
│ │                                │ ┌─────────────┐│
│ │                                │ │Office Hours ││
│ │                                │ │& Info       ││
│ │                                │ └─────────────┘│
│ └─────────────────────────────────────────────────┘ │
│                                                       │
├──────────────────────────────────────────────────────┤
│ FOOTER                                                │
└──────────────────────────────────────────────────────┘
```

**Mobile Layout (375px):**

```
┌──────────────────────────┐
│ PAGE HERO                │
│ "Get in Touch"           │
│                          │
├──────────────────────────┤
│ CONTACT FORM (Stacked)   │
│ Name [input]             │
│ Email [input]            │
│ Company [input]          │
│ Type [dropdown]          │
│ Message [textarea]       │
│ [Submit]                 │
│                          │
├──────────────────────────┤
│ INFO CARDS (Stacked)     │
│ ┌──────────────────────┐ │
│ │ Ways to Reach Us     │ │
│ │ General              │ │
│ │ Partner              │ │
│ │ Press                │ │
│ └──────────────────────┘ │
│                          │
│ ┌──────────────────────┐ │
│ │ Early Updates        │ │
│ │ Newsletter Signup    │ │
│ └──────────────────────┘ │
│                          │
│ ┌──────────────────────┐ │
│ │ Office Hours         │ │
│ └──────────────────────┘ │
│                          │
├──────────────────────────┤
│ FOOTER                   │
└──────────────────────────┘
```

---

### 10. ADMIN DASHBOARD (CMS & Management)

**Layout (1440px):**

```
┌─────────────────────────────────────────────────────────┐
│ LOGO | TAB: Dashboard | TAB: Pages | TAB: Jobs          │
│      | TAB: Applications | TAB: Inquiries | USER [^]    │
├──────────┬──────────────────────────────────────────────┤
│          │                                               │
│  SIDEBAR │              MAIN CONTENT AREA                │
│          │  ┌────────────────────────────────────────┐  │
│  [Dashboard] │ Dashboard / Page Management            │  │
│  [Create]  │ ┌────────────────────────────────────────┐│  │
│  [Pages]   │ │ [Add New] [Filter] [Search]           ││  │
│  [Jobs]    │ ┌────────────────────────────────────────┐│  │
│  [Applicants]│ Table: ID | Title | Status | Edit | Del││  │
│  [Inquiries] │ Row 1: Home | Published | [✎] [🗑]    ││  │
│  [Users]   │ Row 2: Tech | Draft | [✎] [🗑]        ││  │
│  [Settings]  │ Row 3: Jobs | Published | [✎] [🗑]    ││  │
│              │ [Pagination: 1 2 3 »]                  ││  │
│  [Logout]  │                                           ││  │
│            │                                           │  │
│            │  [Modal: Edit Page Form when clicked]     │  │
│            │  ┌────────────────────────────────────────┐│  │
│            │  │ Title: [input]                       ││  │
│            │  │ Slug: [input]                        ││  │
│            │  │ Status: [Published/Draft]            ││  │
│            │  │ Content: [rich text editor]          ││  │
│            │  │ Meta Description: [textarea]         ││  │
│            │  │ [Save] [Cancel]                      ││  │
│            │  └────────────────────────────────────────┘│  │
│            └────────────────────────────────────────────┘  │
│                                                            │
└──────────────────────────────────────────────────────────┘
```

**Admin Sections:**

#### Dashboard Tab

- Quick stats (Total Jobs, Applications, Pending Inquiries)
- Recent activity feed
- System health indicators

#### Pages Tab

- List all content pages (Home, Technology, Robotics, etc.)
- Edit/Create page meta, content, hero sections
- Preview changes before publishing
- Publish/Draft/Archive controls

#### Jobs Tab

- Job listing management
- Create/Edit job postings
- Publishing status
- Application count per job

#### Applications Tab

- Job application inbox
- Candidate information (name, email, resume upload)
- Status tracking (New, Reviewed, Rejected, Offer)
- Interview scheduling

#### Inquiries Tab

- Contact form submissions
- Status (New, Responded, Closed)
- Email communication history
- Early updates subscribers

#### Users Tab

- Admin user management
- Role assignments (Editor, Admin, Moderator)
- Activity logging

#### Settings Tab

- Site configuration
- Email templates
- API keys
- Backup/Restore

---

## Responsive Design Rules

### Breakpoints

- **Mobile:** 0-767px (default/mobile-first)
- **Tablet:** 768px-1023px (md: prefix)
- **Desktop:** 1024px+ (lg: prefix)

### Key Responsive Changes

**Navigation:**

- Mobile: Hamburger menu button, vertical nav links
- Desktop: Horizontal nav links always visible

**Cards & Grids:**

- Mobile: 1 column (grid-cols-1)
- Tablet: 2 columns (md:grid-cols-2)
- Desktop (larger sections): 3-4 columns (md:grid-cols-3/4)

**Hero Section:**

- Mobile: Stacked text + image
- Desktop: Side-by-side layout (text left, image right)

**Admin Sidebar:**

- Mobile: Collapsed/hidden by default, toggle with button
- Desktop: Always visible, 256px width

**Typography:**

- Mobile: Smaller base size (16px), headings 1.75-2rem
- Desktop: Larger base size (18px), headings 2.5-3rem

**Spacing:**

- Mobile: 1rem padding/margins
- Desktop: 2-3rem padding/margins

---

## Component Types & Patterns

### Page Structure Components

- **PageHero:** Gradient background, centered heading + description, optional CTA buttons
- **SiteContainer:** Max-width wrapper, responsive padding
- **Section:** Vertical spacing container with optional muted background
- **GridCards:** Responsive grid of card components (1/2/3/4 columns)
- **CTABand:** Full-width blue background section with centered CTA text + buttons

### Card Components

- **ValueCard:** Icon + Title + Description (small card, 1/3 to 1/4 width)
- **FeatureCard:** Heading + List items + Link (medium card)
- **DivisionCard:** Icon + Title + Description + Arrow link (clickable)
- **ChecklistCard:** Title + List with checkmarks

### Form Components

- **TextInput:** Standard input fields
- **Select:** Dropdown menus
- **Textarea:** Multi-line text input
- **RichTextEditor:** WYSIWYG content editor (admin)
- **FileUpload:** Resume/document uploads

### Navigation Components

- **MainNav:** Sticky header with logo + menu links + CTA button
- **SidebarNav:** Fixed sidebar with category links (admin)
- **Breadcrumbs:** Navigation path indicator
- **PaginationControls:** Page navigation for lists

### Content Components

- **RichTextDisplay:** Rendered HTML content (blog, pages)
- **JobCard:** Title + Description + Apply button
- **ApplicationCard:** Candidate info + Resume + Status + Actions
- **InquiryCard:** Message + Contact + Status + Reply form

---

## Color System Reference

**Primary Colors:**

- Brand Blue: #006eff
- Text Primary: #1a1a1a
- Text Secondary: #666666
- Text Muted: #999999

**Backgrounds:**

- Light/Card: #ffffff
- Muted Section: #f5f5f5
- Dark/Footer: #1a1a1a

**States:**

- Success: #10b981
- Warning: #f59e0b
- Danger: #ef4444

---

## User Flow Diagrams

### Public User Journey

```
Landing → Explore (Tech/Robotics/Appliances) 
        ↓
        Get Safety Overview → Build Trust
        ↓
        Ready to Engage → Careers/Partnership/EarlyUpdates/Contact
```

### Job Application Flow

```
Careers Page → Job Details → Apply Form → Resume Upload 
            ↓
            Confirmation Email → Auto-Notification to Team 
            ↓
            Admin Reviews → Sends Interview Invite → Candidate Responds
            ↓
            Status Update in Admin Dashboard
```

### Inquiry/Contact Flow

```
Contact Form Submission → Validation → Database Entry
        ↓
        Email Notification to Team
        ↓
        Admin Marks as "Reviewed"/"Responded"/"Closed"
        ↓
        Auto-response Email to Submitter
```

### Newsletter/Early Updates Flow

```
Contact Form (early_interest) OR Separate Email Signup
        ↓
        Email Confirmation sent
        ↓
        Added to Subscriber List
        ↓
        Admin Can Send Bulk Announcements
```

---

## Accessibility Considerations

- **Color Contrast:** All text meets WCAG AA standards (4.5:1 contrast ratio)
- **Keyboard Navigation:** All interactive elements accessible via Tab key
- **ARIA Labels:** Form inputs, buttons, and landmarks have descriptive labels
- **Skip Links:** "Skip to main content" link for keyboard users
- **Images Descriptions:** All imgs have alt text
- **Form Validation:** Clear error messages inline
- **Focus Indicators:** Visible focus states on interactive elements

---

## Performance Optimizations

- **Lazy Loading:** Images load as user scrolls
- **CSS Minification:** CSS delivered minified
- **JS Bundling:** App.js bundled and minified
- **Caching Headers:** Static assets cached long-term
- **CDN Ready:** Asset paths compatible with CDN delivery
- **Page Speed:** Target <2s First Contentful Paint
