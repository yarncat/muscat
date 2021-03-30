                            <div class="input">
                                <label>Название альбома</label>
                                <input type="text" name="title" value="{{ old('title') ?? $album->title ?? '' }}" required>
                                @error('title')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input">
                                <label>Исполнитель</label>
                                <input type="text" name="artist" value="{{ old('artist') ?? $album->artist ?? '' }}" required>
                                @error('artist')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input">
                                <label>Дата релиза</label>
                                <input type="date" name="release" value="{{ old('release') ?? $album->release ?? '' }}" required>
                                @error('release')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input">
                                <label>Лейбл</label>
                                <input type="text" name="label" value="{{ old('label') ?? $album->label ?? '' }}" required>
                                @error('label')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input">
                                <label>Обложка</label>
                                <input type="file" name="image_link" id="imgInp">
                                @error('image_link')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="save">Сохранить изменения</button>
                        