const $body = document.querySelector('body')
const sidebar = document.querySelector('.app-sidebar')
const app = document.querySelector('.app')

const modalsOpener = document.querySelectorAll('[role="modal"]')

const createModal = (content, size = 'sm') => {
  // retorna o elemento modal
  const modal = document.createElement('div')
  modal.className = 'modal'

  const modalDialog = document.createElement('div')
  modalDialog.className = `modal-dialog modal-${size} modal-dialog-centered`

  const modalContent = document.createElement('div')
  modalContent.className = 'modal-content'

  modalContent.innerHTML = content
  modalDialog.append(modalContent)
  modal.append(modalDialog)

  $body.append(modal)

  const mainModal = new bootstrap.Modal(modal)
  mainModal.show()

  modal.addEventListener('hidden.bs.modal', (e) => {
    //destroy modal
    modal.remove()
  })
}

const openModal = async (route, options) => {
  if (route) {
    const response = await fetchJson(route, '', 'GET')

    createModal(clearDoubleQuotes(response.body), options)
  }
}

for (const modalOpener of modalsOpener) {
  modalOpener.addEventListener('click', function (e) {
    e.preventDefault()
    openModal(this.getAttribute('href'), this.dataset.modalSize)
  })
}

document.querySelector('a[href="show-sidebar"]').addEventListener('click', (e) => {
  e.preventDefault()
  app.classList.toggle('sidebar-show')
})

document.querySelector('.app-footer a[href="about"]').addEventListener('click', (e) => {
  e.preventDefault()
  const myString = `<div class="modal-header">
  <h5 class="modal-title">Portaria System</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
  <p>2018 → Cleimar Lemes</p>
  2022 → @washalbano
</div>`

  createModal(myString)
})

//
const clearDoubleQuotes = (string) => {
  // se o corpo da mensagem for uma double quoted json string
  if (string.length >= 2 && string.charAt(0) == '"' && string.charAt(string.length - 1) == '"') {
    // remove as aspas duplas
    string = string.slice(1, string.length - 1)
  }

  return string
}

/**
 * Funçõo para submeter requests a um servidor, esperendo json como resposta
 * @param url
 * @param data
 * @param method
 * @returns {Promise<any>}
 */
const fetchJson = async (url, data, method = 'POST') => {
  const headers = {
    method: method
  }

  if (method === 'POST') {
    headers.body = data
  }

  const retorno = {
    statusCode: 404,
    body: 'not found'
  }

  // faz o request
  const request = await fetch(url, headers)

  if (request.status === 200 && request.headers.get('content-type').includes('json')) {
    // converte o resultado da request em json
    const body = await request.json()
    // define retorno da resposta
    retorno.statusCode = request.status
    retorno.body = clearDoubleQuotes(body)
  } else {
    const body = await request.text()
    // define retorno
    retorno.statusCode = request.status == 200 ? 400 : request.status
    retorno.body = clearDoubleQuotes(body)
  }

  return retorno
}
