<?php
/**
 * Formulario de contacto GES
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

?>

<form
  class="w-full flex flex-col gap-[8px]"
  method="post"
  action=""
>

  <?php wp_nonce_field( 'ges_contact_form', 'ges_contact_nonce' ); ?>

  <div>

    <label class="sr-only" for="contact-name">
      Nombre completo
    </label>

    <input
      id="contact-name"
      name="contact_name"
      type="text"
      required
      autocomplete="name"
      placeholder="Nombre completo"
      class="
                w-full
                h-[56px]
                rounded-[6px]
                border
                border-[#BDBDBD]
                bg-white
                px-2
                text-[15px]
                font-thin
                text-negro
                placeholder:text-[#CFCFCF]
                outline-none
                transition
                focus:border-azul-electrico
                focus:ring-2
                focus:ring-azul-electrico/20
            "
    >

  </div>

  <div>

    <label class="sr-only" for="contact-email">
      E-mail
    </label>

    <input
      id="contact-email"
      name="contact_email"
      type="email"
      required
      autocomplete="email"
      placeholder="E-mail"
      class="
                w-full
                h-[56px]
                rounded-[6px]
                border
                border-[#BDBDBD]
                bg-white
                px-2
                text-[15px]
                font-thin
                text-negro
                placeholder:text-[#CFCFCF]
                outline-none
                transition
                focus:border-azul-electrico
                focus:ring-2
                focus:ring-azul-electrico/20
            "
    >

  </div>

  <div>

    <label class="sr-only" for="contact-company">
      Empresa
    </label>

    <input
      id="contact-company"
      name="contact_company"
      type="text"
      autocomplete="organization"
      placeholder="Empresa"
      class="
                w-full
                h-[56px]
                rounded-[6px]
                border
                border-[#BDBDBD]
                bg-white
                px-2
                text-[15px]
                font-thin
                text-negro
                placeholder:text-[#CFCFCF]
                outline-none
                transition
                focus:border-azul-electrico
                focus:ring-2
                focus:ring-azul-electrico/20
            "
    >

  </div>

  <div>

    <label class="sr-only" for="contact-message">
      Mensaje
    </label>

    <textarea
      id="contact-message"
      name="contact_message"
      required
      rows="6"
      placeholder="Mensaje..."
      class="
                w-full
                min-h-[140px]
                rounded-[6px]
                border
                border-[#BDBDBD]
                bg-white
                px-2
                py-4
                text-[15px]
                font-thin
                text-negro
                placeholder:text-[#CFCFCF]
                outline-none
                resize-none
                transition
                focus:border-azul-electrico
                focus:ring-2
                focus:ring-azul-electrico/20
            "
    ></textarea>

  </div>

  <button
    type="submit"
    name="ges_contact_submit"
    class="
            mt-1
            flex
            h-[52px]
            w-full
            items-center
            justify-center
            gap-2
            rounded-[6px]
            bg-[#1C1C2C]
            text-[15px]
            font-thin
            text-white
            transition-all
            duration-300
            hover:bg-negro
            hover:gap-3
            hover:cursor-pointer
        "
  >

    <span>Enviar</span>

    <svg
      xmlns="http://www.w3.org/2000/svg"
      width="15"
      height="15"
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      stroke-width="2"
      stroke-linecap="round"
      stroke-linejoin="round"
    >
      <path d="M5 12h14"/>
      <path d="m13 5 7 7-7 7"/>
    </svg>

  </button>

</form>