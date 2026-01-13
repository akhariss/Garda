/**
 * main.js - Global App Logic
 */

const App = {
  /**
   * Helper to perform AJAX POST requests
   * @param {string} url
   * @param {FormData} body
   */
  post: async (url, body) => {
    try {
      const response = await fetch(url, {
        method: "POST",
        body: body,
      });
      return await response.json();
    } catch (error) {
      console.error("API Error:", error);
      return { success: false, message: "Gagal terhubung ke server." };
    }
  },

  /**
   * UI Helper: Show alert inside a container
   * @param {string} elementId
   * @param {string} message
   * @param {string} type
   */
  showAlert: (elementId, message, type = "error") => {
    const box = document.getElementById(elementId);
    if (!box) return;

    box.textContent = message;
    box.className = `alert alert-${type}`;
    box.style.display = "block";

    if (type === "error") {
      box.classList.add("shake");
      setTimeout(() => box.classList.remove("shake"), 500);
    }
  },
};
