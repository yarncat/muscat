                            <div class="tracks">
                                @foreach($tracks as $track)
                                <div class="track">
                                    <label>№ трека
                                        <input type="number" class="id" name="track_number[]" value="{{ $track->track_number }}" required>
                                    </label>
                                    <label>Название трека
                                        <input type="text" class="name" name="track_title[]" value="{{ $track->track_title }}" required>
                                    </label>
                                    <label>Время*
                                        <input type="text" class="time" name="duration[]" value="{{ $track->duration }}" required>
                                    </label>
                                    <input type="hidden" name="id[]" value="{{ $track->id }}">
                                    <button type="submit" name="delete" class="delete-track" value="{{ $track->id }}">
                                        <img src="{{ asset('img/delete.svg') }}">
                                    </button>
                                </div>
                                @endforeach
                            </div>
                            <div>
                                <span class="error track_number"></span>
                            </div>
                            <div>
                                <span class="error track_title"></span>
                            </div>
                            <div>
                                <span class="error duration"></span>
                            </div>
                            <button type="button" class="add">Добавить поля</button>
                            <button type="button" class="cancel">Отменить</button>
                            <button type="submit" class="save">Сохранить изменения</button>
                            <p class="exp">* Время - длительность трека в минутах и секундах (мм:сс)</p>
                        