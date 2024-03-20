var deleteButton = document.getElementById('deleteButton');
deleteButton.addEventListener('click', function(e) {
    e.preventDefault(); // Предотвращаем перезагрузку страницы

    // Если вы хотите показать подтверждение перед удалением
    if (confirm('Вы точно хотите удалить публикацию?')) {
        // Отправляем форму, если пользователь подтвердил удаление
        this.form.submit();
    }
});