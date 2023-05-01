<?php
namespace FlankSilva\formUI;

/**
 * Criar o componente de input.
 * Para pergar o retono do status de todos os inputs, utilize a função ***inputValidateValue()***,
 * armazenando em uma variavel o retorno ***true*** ou ***false***.
 * Exemplo: const status = inputValidateValue().
 * @param classContainer: Estilizar div global, contendo todos os elementos.
 * @param classContent: Estilizar div, contendo o input e o icone.
 * @param classInput: Estilizar o input.
 * @param classIconError: Estilizar o icone.
 * @param classTextError: Estilizar o texto de erro.
 * @param typeValidate: 'nome' | 'cpf' | 'cnpj' | 'cpfcnpj' | 'datanasc' | 'email' | 'cel' | 'tel' | 
 * 'celreq' | 'telreq' | 'telreq' | 'telcel' | 'cep' | 'required' | 'banks' | 
 * 'cidade-nascimento' | 'numbers' | 'datExpedicao' | 'datNascimentoEmprestimo' | 
 * 'renda-mensal' | 'parcelas' | 'confirma-senha' | 'senha'.
 * @param 
 */

function Input(
  $id = '',
  $placeholder = '',
  $typeValidate = '',
  $typeInput = '',
  $textError = '',
  $classContainer = '',
  $classContent = '',
  $classInput = '',
  $classIconError = '',
  $classTextError = ''
)
{

?>
  <style>
    .container-dynamic-input {}

    .content-dynamic-input {
      border: 1px solid;

      display: flex;
      flex-direction: row;
      align-items: center;
    }

    .input-dynamic-input {
      flex: 1;
      border: none;
      outline: none;
    }

    .text-error-dynamic-input {
      margin: 0;
      padding: 0;
    }

    .invisible {
      display: none;
    }

    .noVisibled {
      opacity: 0;
    }

    .icon-error-dynamic-input {
      min-width: 22px;
      min-height: 22px;
    }
  </style>

  <span id="status-input-<?php echo $id?>"  style="display: none;"></span>

  <div class="container-dynamic-input <?php echo $classContainer?>">
    <div class="content-dynamic-input <?php echo $classContent?>">
      <input 
        id="<?php echo $id?>"
        class="<?php echo $classInput?> input-dynamic-input"
        type="<?php echo $typeInput?>"
        autocomplete=""
        name="<?php echo $typeValidate?>"
        placeholder="<?php echo $placeholder?>"
        oninput="inputValidateValue(
        ); maskInput('<?php echo $id?>', '<?php echo $typeValidate?>');
          maxLengthInput('<?php echo $id?>', '<?php echo $typeValidate?>'
        )
        "
      >
    
      <!-- Carinha -->

      <svg id="icon-status-dynamic-input-default-<?php echo $id?>" class="icon-error-dynamic-input  <?php echo $classIconError?>" width="22" height="22" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10ZM20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20C8.68678 20 7.38642 19.7413 6.17317 19.2388C4.95991 18.7362 3.85752 17.9997 2.92893 17.0711C1.05357 15.1957 0 12.6522 0 10C0 7.34784 1.05357 4.8043 2.92893 2.92893C4.8043 1.05357 7.34784 0 10 0C11.3132 0 12.6136 0.258658 13.8268 0.761205C15.0401 1.26375 16.1425 2.00035 17.0711 2.92893C17.9997 3.85752 18.7362 4.95991 19.2388 6.17317C19.7413 7.38642 20 8.68678 20 10ZM8 7.5C8 8.3 7.3 9 6.5 9C5.7 9 5 8.3 5 7.5C5 6.7 5.7 6 6.5 6C7.3 6 8 6.7 8 7.5ZM15 7.5C15 8.3 14.3 9 13.5 9C12.7 9 12 8.3 12 7.5C12 6.7 12.7 6 13.5 6C14.3 6 15 6.7 15 7.5ZM10 15.23C8.25 15.23 6.71 14.5 5.81 13.42L7.23 12C7.68 12.72 8.75 13.23 10 13.23C11.25 13.23 12.32 12.72 12.77 12L14.19 13.42C13.29 14.5 11.75 15.23 10 15.23Z" fill="#E7E7E7"/>
      </svg>
      
      <!-- Carinha Feliz -->
      <svg id="icon-status-dynamic-input-feliz-<?php echo $id?>" class="icon-error-dynamic-input invisible  <?php echo $classIconError?>" width="22" height="22" viewBox="0 0 20 20" fill="#27ae60" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 0C4.486 0 0 4.486 0 10C0 15.514 4.486 20 10 20C15.514 20 20 15.514 20 10C20 4.486 15.514 0 10 0ZM10 18C5.589 18 2 14.411 2 10C2 5.589 5.589 2 10 2C14.411 2 18 5.589 18 10C18 14.411 14.411 18 10 18Z"/>
        <path d="M6.5 9C7.32843 9 8 8.32843 8 7.5C8 6.67157 7.32843 6 6.5 6C5.67157 6 5 6.67157 5 7.5C5 8.32843 5.67157 9 6.5 9Z"/>
        <path d="M13.493 8.986C14.3176 8.986 14.986 8.31756 14.986 7.493C14.986 6.66844 14.3176 6 13.493 6C12.6684 6 12 6.66844 12 7.493C12 8.31756 12.6684 8.986 13.493 8.986Z" />
        <path d="M10 16C15 16 16 11 16 11H4C4 11 5 16 10 16Z" />
      </svg>


      <!-- CArinha Triste -->
      <svg id="icon-status-dynamic-input-triste-<?php echo $id?>" class="icon-error-dynamic-input invisible <?php echo $classIconError?>" width="22" height="22" viewBox="0 0 20 20" fill="#ff4d4d" xmlns="http://www.w3.org/2000/svg">
      <path d="M18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10ZM20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20C8.68678 20 7.38642 19.7413 6.17317 19.2388C4.95991 18.7362 3.85752 17.9997 2.92893 17.0711C1.05357 15.1957 0 12.6522 0 10C0 7.34784 1.05357 4.8043 2.92893 2.92893C4.8043 1.05357 7.34784 0 10 0C11.3132 0 12.6136 0.258658 13.8268 0.761205C15.0401 1.26375 16.1425 2.00035 17.0711 2.92893C17.9997 3.85752 18.7362 4.95991 19.2388 6.17317C19.7413 7.38642 20 8.68678 20 10ZM8 7.5C8 8.3 7.3 9 6.5 9C5.7 9 5 8.3 5 7.5C5 6.7 5.7 6 6.5 6C7.3 6 8 6.7 8 7.5ZM15 7.5C15 8.3 14.3 9 13.5 9C12.7 9 12 8.3 12 7.5C12 6.7 12.7 6 13.5 6C14.3 6 15 6.7 15 7.5Z"/>
      <path d="M14.1901 13.81C13.2901 12.73 11.7501 12 10.0001 12C8.25006 12 6.71006 12.73 5.81006 13.81L7.23006 15.23C7.68006 14.51 8.75006 14 10.0001 14C11.2501 14 12.3201 14.51 12.7701 15.23L14.1901 13.81Z"/>
      </svg>

    </div>
    <p 
      id="text-error-dynamic-input-<?php echo $id?>" 
      class="text-error-dynamic-input noVisibled <?php echo $classTextError?>">
        <?php echo $textError?>
    </p>
  </div>

  
<?php
} 
?>



<!-- SelectBox -->
<?php
/**
 * Criar o componente de Select.
 * Para pergar o retono do status de todos os inputs, utilize a função ***inputValidateValue()***,
 * armazenando em uma variavel o retorno ***true*** ou ***false***.
 * Exemplo: const status = inputValidateValue().
 * 
 * @param options: Deve receber um array de objetos, onde cada item tenha uma chave ***label*** e ***value***.
 * @param classDisplayContainer: Estilizar container do select (tag select e icone).
 * @param classArrowIcon: Estiliza o icone do display, podendo ajustar a posição do icone.
 * @param classSelect: Estiliza a tag do select.
 * @param classOption: Estiliza cada option.
 * @param classTextError: Estiliza o texto de erro
 */


function Select(
  $id = '',
  $options = array(
    array('label' => 'Label1', 'value' => 'label1', 'status' => false),
  ),
  $colorArraw = '#000',
  $textError = 'Campo ínvalido',
  $classDisplayContainer = '',
  $classArrowIcon = '',
  $classSelect = '',
  $classOption = '',
  $classTextError = ''
) {
?>
  <style>

    .container-select-dynamic-select {
      width: 100%;
    }
    .display-dynamic-select {
      display: flex;
      flex-direction: row;
      align-items: center;

      position: relative;

      border: 1px solid;
    }

    .select-dynamic-select {
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      background: transparent;

      width: 100%;
    }

    .icon-arrow-dynamic-select {
      position: absolute;
      left: 92%;
    }

    .noVisibled {
      opacity: 0;
    }

    .text-error-dynamic-input {
      margin: 0;
      padding: 0;
    }
  </style>

  <div class="container-select-dynamic-select">
    <div class="display-dynamic-select <?php echo $classDisplayContainer?>">
      <select 
        name="required" 
        id="<?php echo $id?>" 
        class="input-dynamic-input select-dynamic-select <?php echo $classSelect?>"
        onchange="inputValidateValue()"
      >
        <?php
          foreach ($options as $option) {
          ?>
            <option class="<?php echo $classOption?>" value="<?php echo $option['value']?>">
              <?php echo $option['label']?>
            </option>
          <?php
          }
        ?>
      </select>
      <svg 
        width="13" 
        height="8" 
        viewBox="0 0 13 8" 
        fill="none" 
        xmlns="http://www.w3.org/2000/svg"
        class="icon-arrow-dynamic-select <?php echo $classArrowIcon?>"
      >
        <path 
          d="M5.23748 7.47826L0.55106 2.95652C-0.0197223 2.4058 -0.147097 1.77565 0.168937 1.06609C0.48497 0.356522 1.04794 0.00115942 1.85785 0H11.1406C11.9517 0 12.5153 0.355362 12.8313 1.06609C13.1473 1.77681 13.0194 2.40696 12.4474 2.95652L7.76094 7.47826C7.5807 7.65217 7.38543 7.78261 7.17514 7.86956C6.96485 7.95652 6.73954 8 6.49921 8C6.25888 8 6.03358 7.95652 5.82329 7.86956C5.613 7.78261 5.41773 7.65217 5.23748 7.47826Z" 
          fill="<?php echo $colorArraw?>"
        />
      </svg>
    </div>
    <p 
      id="text-error-dynamic-input-<?php echo $id?>" 
      class="text-error-dynamic-input noVisibled <?php echo $classTextError?>">
        <?php echo $textError?>
    </p>
  </div>
<?php
}
?>

<!-- Checkbox -->
<?php
  /**
 * Criar o componente de Checkbox.
 * Para pergar o valor selecionado no checkbox, utilize o getElementById pelo id ***"status-checked-dynamic-select-ID"***,
 * onde esse ***'ID'*** e o mesmo que foi passado como parametro.
 * 
 * @param label: A label deve ser passada como tag customizada em formato de string, seguindo o exemplo:.
 * <label class="" for="checkTermos">Lorem ipsun</label>.
* @param functionGetStatusValues: Seta a função de validação pelo metodo onInput.
 * Deve ser declarado, quando há a necessidade de capturar o status de todos os campos de forma externa.
 * Exemplo: Habilitar um botão de "ENVIAR"
 * @param 

 */

function Checkbox(
    $id = '', 
    $label = '', 
    $checked = 'checked', 
    $textError = 'Campo ínvalido', 
    $classTextError = ''
  ) {
  $isCkecked = $checked == true ? 'true' : 'false';

  $isVisibledIconFeliz = $checked == true ? '' : 'invisible';
?>

<style>
  .container-dynamic-termos {
    display: flex;
    flex-direction: column;
  }
  .content-dynamic-termos {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 100%;
  }
  .container-text-error-ckeckbox-dynamic-checkbox {
    display: flex;

    gap: 5px;
  }

  .custon-input-checked {
    flex: none;
  }
</style>
  <div class="container-dynamic-termos">
    <span id="status-checked-dynamic-select-<?php echo $id?>" style="display: none;">
      <?php echo $isCkecked?>
    </span>
    <div class="content-dynamic-termos">
      <input 
        type="checkbox" 
        id="<?php echo $id?>" 
        class="input-dynamic-input custon-input-checked"
        name="required"
        onclick="inputValidateValue(); setCarinhaCheck('<?php echo $id?>')"
        <?php echo $checked?> 
      >
      <?php echo $label?>
      <!-- Carinha Feliz -->
        <svg id="icon-status-dynamic-checked-feliz-<?php echo $id?>" class="icon-error-dynamic-input <?php echo $isVisibledIconFeliz?>" width="22" height="22" viewBox="0 0 20 20" fill="#27ae60" xmlns="http://www.w3.org/2000/svg">
          <path d="M10 0C4.486 0 0 4.486 0 10C0 15.514 4.486 20 10 20C15.514 20 20 15.514 20 10C20 4.486 15.514 0 10 0ZM10 18C5.589 18 2 14.411 2 10C2 5.589 5.589 2 10 2C14.411 2 18 5.589 18 10C18 14.411 14.411 18 10 18Z"/>
          <path d="M6.5 9C7.32843 9 8 8.32843 8 7.5C8 6.67157 7.32843 6 6.5 6C5.67157 6 5 6.67157 5 7.5C5 8.32843 5.67157 9 6.5 9Z"/>
          <path d="M13.493 8.986C14.3176 8.986 14.986 8.31756 14.986 7.493C14.986 6.66844 14.3176 6 13.493 6C12.6684 6 12 6.66844 12 7.493C12 8.31756 12.6684 8.986 13.493 8.986Z" />
          <path d="M10 16C15 16 16 11 16 11H4C4 11 5 16 10 16Z" />
        </svg>

        <!-- CArinha Triste -->
        <svg id="icon-status-dynamic-checked-triste-<?php echo $id?>" class="icon-error-dynamic-input invisible" width="22" height="22" viewBox="0 0 20 20" fill="#ff4d4d" xmlns="http://www.w3.org/2000/svg">
          <path d="M18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10ZM20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20C8.68678 20 7.38642 19.7413 6.17317 19.2388C4.95991 18.7362 3.85752 17.9997 2.92893 17.0711C1.05357 15.1957 0 12.6522 0 10C0 7.34784 1.05357 4.8043 2.92893 2.92893C4.8043 1.05357 7.34784 0 10 0C11.3132 0 12.6136 0.258658 13.8268 0.761205C15.0401 1.26375 16.1425 2.00035 17.0711 2.92893C17.9997 3.85752 18.7362 4.95991 19.2388 6.17317C19.7413 7.38642 20 8.68678 20 10ZM8 7.5C8 8.3 7.3 9 6.5 9C5.7 9 5 8.3 5 7.5C5 6.7 5.7 6 6.5 6C7.3 6 8 6.7 8 7.5ZM15 7.5C15 8.3 14.3 9 13.5 9C12.7 9 12 8.3 12 7.5C12 6.7 12.7 6 13.5 6C14.3 6 15 6.7 15 7.5Z"/>
          <path d="M14.1901 13.81C13.2901 12.73 11.7501 12 10.0001 12C8.25006 12 6.71006 12.73 5.81006 13.81L7.23006 15.23C7.68006 14.51 8.75006 14 10.0001 14C11.2501 14 12.3201 14.51 12.7701 15.23L14.1901 13.81Z"/>
        </svg>
    </div>
    <p 
      id="text-error-dynamic-input-<?php echo $id?>" 
      class="text-error-dynamic-input noVisibled <?php echo $classTextError?>">
        <?php echo $textError?>
    </p>
  </div>

<?php
}
?>

<!-- RadioYesNo -->
<?php
  /**
 * Criar o componente de YesNo.
 * Para pergar o valor selecionado do component, utilize o getElementById pelo id ***"checked-ID"***,
 * onde esse ***'ID'*** e o mesmo que foi passado como parametro.
 * Será retornado ***true(SIM)*** ou ***false(NAO)***
 * Exemplo: const checked = document.getElementById('checked-MEUID').checked
 * 
 * @param label: A label deve ser passada como tag customizada em formato de string, seguindo o exemplo:.
 * <label class="" for="checkTermos">Lorem ipsun</label>.
* @param
 * @param 

 */

function RadioYesNo(
  $id = '', 
  $textError = 'Campo ínvalido',
  $bgColor = '#fff',
  $color = '#bcbcbc',
  $bgColorHoverButton = '#f88430',
  $colorTextHoverButton = '#fff',
  $borderColor  = 'gray',
  $classContentButton = '',
  $classButton = '',
  $classTextError = ''
) {
?>

<style>
  .container-dynamic-button {
    display: flex;
    flex-direction: column;

    width: 100%;
  }

  .content-dynamic-button {
    width: 100%;

    display: flex;
    flex-direction: row;
    justify-content: space-between;

  }

  .button-dynamic-button {
    background: none;
    cursor: pointer;
  }

  .button-dynamic-button:hover {
    background-color: <?php echo $bgColorHoverButton?> !important;
    color: <?php echo $colorTextHoverButton?> !important;
  }

</style>
  <div class="container-dynamic-button">
    <input name="required" id="checked-<?php echo $id?>" style="display: none;" type="checkbox"> <!-- salva true(SIM) ou false(NAO) -->
    <input class="input-dynamic-input" style="display: none; " id="<?php echo $id?>" type="checkbox">

    <div class="content-dynamic-button <?php echo $classContentButton?>">
      <button
        id="btn-label-yes-dynamic-button-<?php echo $id?>"
        type="button"
        style="background-color: <?php echo $bgColor?>; color: <?php echo $color?>; border: 1px solid <?php echo $borderColor?>;"
        class="button-dynamic-button <?php echo $classButton?>"
        onclick="
          setValueYesNo(
            'SIM', 
            '<?php echo $id?>', 
            '<?php echo $bgColorHoverButton?>', 
            '<?php echo $colorTextHoverButton?>',
            '<?php echo $bgColor?>',
            '<?php echo $color?>'
          );
          inputValidateValue()
        "
      >
        Sim
      </button>
      <button
        id="btn-label-no-dynamic-button-<?php echo $id?>"
        type="button"
        style="background-color: <?php echo $bgColor?>; color: <?php echo $color?>; border: 1px solid <?php echo $borderColor?>;"
        class="button-dynamic-button <?php echo $classButton?>"
        onclick="
          setValueYesNo(
            'NAO', 
            '<?php echo $id?>', 
            '<?php echo $bgColorHoverButton?>', 
            '<?php echo $colorTextHoverButton?>',
            '<?php echo $bgColor?>',
            '<?php echo $color?>'
          );
          inputValidateValue()
        "
      >
        Não
      </button>
    </div>
    <p 
      id="text-error-dynamic-input-<?php echo $id?>" 
      class="text-error-dynamic-input noVisibled <?php echo $classTextError?>">
        <?php echo $textError?>
    </p>
  </div>

<?php
}
?>

<script>
    function hasNumbers(a) {
      return /\d/g.test(a);
    }

    const setCarinhaCheck = (id) => {
      const isCheck = document.getElementById(id)
      const feliz = document.getElementById(`icon-status-dynamic-checked-feliz-${id}`)
      const triste = document.getElementById(`icon-status-dynamic-checked-triste-${id}`)

      if (isCheck.checked) {
        feliz.classList.remove('invisible')
        triste.classList.add('invisible')
      } else {
        feliz.classList.add('invisible')
        triste.classList.remove('invisible')
      }
    }

    const setValueYesNo = (value, id, bgColorHover, colorHover, bgColor, color) => {
      const getStatus = document.getElementById(`checked-${id}`)
      const isChecked = document.getElementById(id)

      const labelYes = document.getElementById(`btn-label-yes-dynamic-button-${id}`)
      const labelNo = document.getElementById(`btn-label-no-dynamic-button-${id}`)

      isChecked.checked = true

      if (value === 'SIM') {
        getStatus.checked = true

        labelYes.style.backgroundColor = bgColorHover
        labelYes.style.color = colorHover
        labelYes.style.border = 0

        labelNo.style.backgroundColor = bgColor
        labelNo.style.color = color
        labelNo.style.border = '1px solid'
      } else {
        getStatus.checked = false

        labelNo.style.backgroundColor = bgColorHover
        labelNo.style.color = colorHover
        labelNo.style.border = 0

        labelYes.style.backgroundColor = bgColor
        labelYes.style.color = color
        labelYes.style.border = '1px solid'
      }
    }

    const validateCheckbox = (id, statusId, iconFelizID, iconTristeID) => {
      const check = document.getElementById(id)
      const status = document.getElementById(statusId)

      const iconFeliz = document.getElementById(iconFelizID)
      const iconTriste = document.getElementById(iconTristeID)

      if (status.innerHTML.trim() == 'true') {
        status.innerHTML = 'false'

        iconTriste.classList.remove('invisible')
        iconFeliz.classList.add('invisible')
      } else {
        status.innerHTML = 'true'

        iconTriste.classList.add('invisible')
        iconFeliz.classList.remove('invisible')
      }
    }

    let dataOptions = {}
    let itensOptionsToSelect = ''

    const testeMinhaFuncao = () => {
      console.log('Testing...');
    }

    // Função chamada pela digitação
    const inputValidateValue = () => {
      const inputsElements = document.querySelectorAll('.input-dynamic-input')
      
      let statusValidation = 0

      inputsElements.forEach(input => {
        const textErrorValue = document.getElementById(`text-error-dynamic-input-${input.id}`)
        const iconStatusFeliz = document.getElementById(`icon-status-dynamic-input-feliz-${input.id}`)
        const iconStatusTriste = document.getElementById(`icon-status-dynamic-input-triste-${input.id}`)
  
        const iconDefalt = document.getElementById(`icon-status-dynamic-input-default-${input.id}`)
  
        // const status = document.getElementById(statusId)

  
        const selectFunctionValidaction = listTypes[input.name]
  
        // const result = input.type === 'checkbox' ? input.checked : selectFunctionValidaction(input.value)

        let result = false

        // input.type === 'radio'
        if (input.type === 'checkbox') {
          result = input.checked
        } else {
          result = selectFunctionValidaction(input.value)
        }

        if (result === false) {
          statusValidation = statusValidation + 1
        }


        if (iconDefalt) {
          iconDefalt.classList.add('invisible')
        }
  
  
        if (result) {
          if (iconDefalt) {
            iconStatusFeliz.classList.remove('invisible')
            iconStatusTriste.classList.add('invisible')
          }
          textErrorValue.classList.add('noVisibled')
        } else {
          if (iconDefalt) {
            iconStatusFeliz.classList.add('invisible')
            iconStatusTriste.classList.remove('invisible')
          }
          textErrorValue.classList.remove('noVisibled')
        }
      })


      return statusValidation > 0 ? false : true
    }

    const maskInput = (id, type) => {
      const myInput = document.getElementById(id)

      const selectFunctionMask = listTypesMask[type]

      if (selectFunctionMask) {
        myInput.value = selectFunctionMask(myInput.value)
      }
    }

    const maxLengthInput = (id, type) => {

      const myInput = document.getElementById(id)

      const length = listMaxLength[type]
      
      if (length) {
        myInput.maxLength = length
      }

    }

    // Funções para mascaras
    const setMaskPhone = (valor = '') => {
      valor = valor.replace(/\D/g, "")
      valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
      valor = valor.replace(/(\d)(\d{4})$/, "$1-$2")

      return valor
    }

    const setMaskCPF = (cpf = '') =>
      cpf
        ? cpf
            .replace(/\D/g, '')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d{1,2})$/, '$1-$2')
        : ''
    ;


    const setMaskCNPJ = (cnpj) => {
      cnpj = cnpj.replace(/[^\d]/g, '');
  
      // Aplica a máscara
      cnpj = cnpj.replace(/(\d{2})(\d)/, '$1.$2');
      cnpj = cnpj.replace(/(\d{3})(\d)/, '$1.$2');
      cnpj = cnpj.replace(/(\d{3})(\d)/, '$1/$2');
      cnpj = cnpj.replace(/(\d{4})(\d{1,2})/, '$1-$2');
      
      return cnpj;
    }

    const setMaskCpfCNPJ = (value) => {
      // Remove caracteres que não são números
      value = value.replace(/[^\d]/g, "");
      
      if (value.length === 11) {
        // CPF format: 999.999.999-99
        return value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
      } else if (value.length === 14) {
        // CNPJ format: 99.999.999/9999-99
        return value.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5");
      } else {
        return value;  // retorna o valor original se não for CPF ou CNPJ
      }
    }

    const setMaskCEP = (cep) => {
      const cleanCEP = cep.replace(/\D/g, ''); // Remove caracteres não numéricos
      const regex = /^(\d{5})(\d{3})$/; // Expressão regular para capturar os grupos de dígitos
      const formattedCEP = cleanCEP.replace(regex, '$1-$2'); // Adiciona a máscara
      return formattedCEP;
    }

    const setMaskNumbers = (numebers) => {
      const regex = /[^0-9]/g; // Expressão regular para remover caracteres não numéricos
      return numebers.replace(regex, '');
    }

    // Funções de validação
    const validateName = (a) => {
      return !hasNumbers(a) && /[A-zÀ-ÿ']+\s([A-zÀ-ÿ']\s?)*[A-zÀ-ÿ'][A-zÀ-ÿ']+/g.test(a);
    }

    const validateCpf = (cpf = '') => {
      let newCPF = cpf;
      newCPF = newCPF.replace(/\D/g, '');
      if (newCPF.toString().length != 11 || /^(\d)\1{10}$/.test(newCPF))
          return false;
      let result = true;
      [9, 10].forEach(j => {
          let soma = 0;
          let r;
          newCPF
          .split(/(?=)/)
          .splice(0, j)
          .forEach((e, i) => {
              soma += Number(e) * (j + 2 - (i + 1));
          });
          r = soma % 11;
          r = r < 2 ? 0 : 11 - r;
          if (r != newCPF.substring(j, j + 1)) result = false;
      });
      return result;
    };

    const validateCNPJ = (cnpj = '') => {
      cnpj = cnpj.replace(/\D/g, '');

      if (cnpj.length !== 14) {
        return false;
      }

      let soma = 0;
      for (let i = 0; i < 12; i++) {
        soma += parseInt(cnpj.charAt(i)) * (i < 4 ? 5 - i : 13 - i);
      }
      let dv1 = soma % 11 < 2 ? 0 : 11 - (soma % 11);

      soma = 0;
      for (let i = 0; i < 13; i++) {
        soma += parseInt(cnpj.charAt(i)) * (i < 5 ? 6 - i : 14 - i);
      }
      let dv2 = soma % 11 < 2 ? 0 : 11 - (soma % 11);

      if (dv1 !== parseInt(cnpj.charAt(12)) || dv2 !== parseInt(cnpj.charAt(13))) {
        return false;
      }

      return true;
    }

    const removeMask = (text) => {
      return text.replace(/[^a-zA-Z0-9]/g, "");
    }

    const validateCPFCNPJ = (value) => {
      const newValue = removeMask(value)

      if (newValue.length === 11) {
        return validateCpf(value)
      } else if (newValue.length === 14) {
        return validateCNPJ(value)
      } else {
        return false
      }
    }

    const validateBirthDate = (dataNascimento) => {
      const data = new Date(dataNascimento);

      if (isNaN(data.getTime())) {
        return false;
      }

      const dataAtual = new Date();

      const dataMinima = new Date();
      dataMinima.setFullYear(dataAtual.getFullYear() - 18);

      const dataMaxima = new Date();
      dataMaxima.setFullYear(dataAtual.getFullYear() - 120);

      if (data > dataAtual || data < dataMaxima) {
        return false;
      }

      return true;
    }

    const validateEmail = (email) => {
      let re = /\S+@\S+\.\S+/;

      return re.test(email)
    }

    const validateCel = (phone) => { // (99) 99999-9999
      // const newPhone = setMaskPhone(phone)
      // const regex = '^\\([0-9]{2}\\)((3[0-9]{3}-[0-9]{4})|(9[0-9]{3}-[0-9]{5}))$';
      // return regex.test(newPhone);

      const newPhone = phone.replace(/[^\d]+/g,'').toString()

      let re = new RegExp('^((1[1-9])|([2-9][0-9]))((3[0-9]{3}[0-9]{4})|(9[0-9]{3}[0-9]{5}))$')

      return re.test(newPhone)
    }

    const validateLandline = (phone) => { // (99) 9999-9999
      const newPhone = setMaskPhone(phone)
      const regex = /^\(?([1-9]{2})\)?[-. ]?([2-8]{1})([0-9]{3,4})[-. ]?([0-9]{4})$/;
      const regexCelular = /^\(?([1-9]{2})\)?[-. ]?([9]{1})([0-9]{3,4})[-. ]?([0-9]{4})$/;
      return regex.test(newPhone) && !regexCelular.test(newPhone);
    }

    const validateAllPhones = (numero) => {
      // Expressão regular para validar números de telefone e celular
      const regexTelefone = /^(\(?\d{2}\)?\s)?(\d{4,5}\-\d{4})$/;

      // Testa se o número corresponde à expressão regular
      return regexTelefone.test(numero);
    }

    const validateCep = (cep) => {
      const regexCep = /^[0-9]{5}-?[0-9]{3}$/;

      return regexCep.test(cep);
    }

    const validateCityOfBirth = (city) => {
      return !(hasNumbers(a) || a.length <= 1);
    }

    const validateDateExpedition = (dateExpedition) => {
      
      const newDate = new Date(dateExpedition);

      if (isNaN(newDate.getTime())) {
        return false;
      }

      const currentDate = new Date();

      if (newDate > currentDate) {
        return true;
      }

      return false;
    }

    const validateIsNumber = (number) => {
      return /^\d+$/.test(number);
    }

    const validateRequired = (value) => {
      return /[A-zÀ-ÿ!-_]/g.test(value);
    }

    const validateDateBirthLoan = (a) => {
      var t = a.split("/");
      return (
          !(parseInt(t[2]) <= 1940 || parseInt(t[2]) > 2002) &&
          /(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{4})$/.test(
              a
          )
      );
    }

    const validateMonthlyIncome = (value) => {
      return !(parseInt(value.replace(/\D+/g, "")) > 5e6);
    }

    const validateInstallments = (value) => {
      return 0 !== value
    }

    const validatePassword = (password) => {
      return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])[0-9a-zA-Z$*&@#]{8,}$/.test(password);
    }

    const validateConfirmPassword = (password) => {
      const activePassword = document.getElementById('strPassword')
      if (password != activePassword.value) {
        return false
      } else {
        return true
      }
    }

    // list of functions by types
    const listTypes = {
      'nome': validateName,
      'cpf': validateCpf,
      'cnpj': validateCNPJ,
      'cpfcnpj': validateCPFCNPJ,
      'datanasc': validateBirthDate,
      'email': validateEmail,
      'cel': validateCel,
      'tel': validateLandline,
      'celreq': '',
      'telreq': '',
      'telreq': '',
      'telcel': validateAllPhones,
      'cep': validateCep,
      'required': validateRequired,
      'banks': '',
      'cidade-nascimento': validateCityOfBirth,
      'numbers': validateIsNumber,
      'datExpedicao': validateDateExpedition,
      'datNascimentoEmprestimo': validateDateBirthLoan,
      'renda-mensal': validateMonthlyIncome,
      'parcelas': validateInstallments,
      'confirma-senha': validateConfirmPassword,
      'senha': validatePassword
    }

    const listTypesMask = {
      'cpf': setMaskCPF,
      'cnpj': setMaskCNPJ,
      'cpfcnpj': setMaskCpfCNPJ,
      'cel': setMaskPhone,
      'tel': setMaskPhone,
      'celreq': setMaskPhone,
      'telreq': setMaskPhone,
      'telreq': setMaskPhone,
      'telcel': setMaskPhone,
      'cep': setMaskCEP,
      'numbers': setMaskNumbers,
      'datNascimentoEmprestimo': '',
    }

    const listMaxLength = {
      'cpf': 14,
      'cnpj': 18,
      'cpfcnpj': 18,
      'cel': 15,
      'tel': 14,
      'celreq': 15,
      'telreq': 14,
      'telreq': 14,
      'telcel': 15,
      'cep': 9,
    }
</script>