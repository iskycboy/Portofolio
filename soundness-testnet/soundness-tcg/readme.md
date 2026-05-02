# 🛡️ Soundness TCG - Security Terminal

**Soundness TCG** is a strategic web-based Trading Card Game (TCG) built with a cybersecurity architecture and post-quantum infrastructure theme[cite: 1, 4]. Step into the role of a **System Auditor** and neutralize network threats using advanced cryptographic card mechanics.

**Live Demo:** (https://soundness-tcg.vercel.app)

---

## 🚀 Key Features

### 1. Enterprise-Grade Authentication
*   **Discord OAuth2 Integration:** Securely sync player data using Discord identity providers[cite: 1, 4].
*   **Session Persistence:** Consistent session management across the login terminal and battle arena via Supabase Auth[cite: 4].
*   **Null-Safe Protocols:** Built-in safeguards for accounts without public emails to prevent system crashes[cite: 3].

### 2. Strategic Gameplay (Campaign & PvP)
*   **Campaign Progression:** Ascend through 7 security tiers, from **ROOKIE** to **MASTER**, facing increasingly intelligent AI[cite: 4].
*   **Real-time PvP:** Duel other auditors using a Room ID matchmaking system powered by Supabase Realtime Channels[cite: 4].
*   **Modular Deck Building:** Customize your loadout with **Nodes** (Monsters), **Hacks** (Spells), and **Firewalls** (Traps)[cite: 4].

### 3. Advanced Tech Mechanics
*   **PQ-Stack Live Telemetry:** Monitor real-time cryptographic simulations, including HASH generation and ZKP (Zero-Knowledge Proof) validations for every action[cite: 4].
*   **Migration Sync & Quantum Shield:** Card executions contribute to system synchronization. Reaching **100% Sync** deploys a **Quantum Shield**, reducing incoming damage by 50%[cite: 4].

### 4. Responsive Mobile UX
*   **Context-Aware UI:** Adaptive layout that scales perfectly for smartphones and tablets[cite: 5].
*   **Mobile Battle Log:** A toggleable notification-based log system designed to maximize screen real estate on mobile devices[cite: 5].

---

## 🛠️ Tech Stack

*   **Frontend:** HTML5, CSS3 (Modern Responsive Design), Vanilla JavaScript[cite: 4, 5].
*   **Backend-as-a-Service:** [Supabase](https://supabase.com/) (Auth, PostgreSQL, Realtime Presence)[cite: 1, 4].
*   **Hosting:** [Vercel](https://vercel.com/)[cite: 4].
*   **Assets:** Custom AI-generated ocean-cyberpunk artwork and immersive sfx[cite: 4].

---

## 📂 Project Structure

*   `index.html` - The primary battle terminal and core game logic[cite: 4].
*   `login.html` - Security gateway and identity authentication[cite: 1].
*   `style.css` - Responsive visual architecture and holographic effects[cite: 5].
*   `/images` - Visual asset library for cards and environments[cite: 4].
*   `/audio` - Immersive combat sound effects and background scores[cite: 4].

---

## 🔧 Local Configuration

To run this project locally, initialize the `supaClient` with your Supabase credentials:
```javascript
const SUPABASE_URL = '[https://your-project-id.supabase.co](https://your-project-id.supabase.co)';
const SUPABASE_KEY = 'your-anon-key'; // Starts with eyJ...
