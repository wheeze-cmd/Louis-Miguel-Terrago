/* EmailJS setup for the contact form (from your original script.js) */
(function () {
  emailjs.init("eRblkefiacedFO21V"); // public key from the EmailJS dashboard
})();

const SERVICE_ID  = "service_fycz738";
const TEMPLATE_ID = "template_80ootxq";

const form = document.querySelector(".contact-form");
const note = document.getElementById("formNote");

function showNote(text, isError) {
  if (!note) return alert(text);
  note.textContent = text;
  note.classList.toggle("err", !!isError);
  note.hidden = false;
}

if (form) {
  form.addEventListener("submit", (e) => {
    e.preventDefault(); // stop page reload
    if (form.website && form.website.value) return; // hidden spam trap: bots fill it in

    const data = Object.fromEntries(new FormData(form));
    // Send the same values under the variable names EmailJS templates commonly use,
    // so it works whichever of these your template has: {{from_name}} {{reply_to}} {{message}} ...
    const params = {
      ...data,
      name: data.from_name, user_name: data.from_name,
      email: data.reply_to, from_email: data.reply_to, user_email: data.reply_to,
      title: "Portfolio message from " + data.from_name,
      subject: "Portfolio message from " + data.from_name,
    };

    const btn = form.querySelector('button[type="submit"]');
    btn.disabled = true;
    showNote("Sending…");

    emailjs.send(SERVICE_ID, TEMPLATE_ID, params)
      .then(() => {
        showNote("Message sent! Thanks for reaching out.");
        form.reset();
      })
      .catch((error) => {
        console.log(error);
        showNote("Failed to send. Please try again, or email me directly.", true);
      })
      .finally(() => { btn.disabled = false; });
  });
}

/* Close the mobile menu after tapping a link (the checkbox menu from your old page, if present) */
const menuToggle = document.getElementById("burger");
if (menuToggle) {
  document.querySelectorAll("nav a").forEach(link => {
    link.addEventListener("click", () => {
      setTimeout(() => { menuToggle.checked = false; }, 100);
    });
  });
}
