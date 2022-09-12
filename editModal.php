<!--Modal Edit-->
<div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">แก้ไขโครงการ/รายการ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="mb-3">
          </div>
          <div class="form-group">
            <label for="md-name" class="col-form-label">ชื่อโครงการ/รายการ</label>
            <input type="text" class="form-control" id="mdname" name="mdname">
          </div>
          <div class="form-group">
            <label for="description-text" class="col-form-label">รายละเอียด</label>
            <textarea class="form-control" id="description"></textarea>
          </div>
          <div class="form-group">
            <label for="status" class="col-form-label">สถานะ</label>
            <select name="status" id="status" class="custom-select selevt">
               <option value="1">เปิดใช้งาน</option>
               <option value="0">ปิดใช้งาน</option>
               </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="SaveEdit">
          <span><i class="fas fa-save"></i></span>
          บันทึก
        </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
      <span><i class="fas fa-times"></i></i></span>    
        ปิด
      </button>
      </div>
    </div>
  </div>
</div>