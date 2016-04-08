        <!-- Paginations -->
        <div class="pagination pagination-minimal">
            <ul>
            <li class="boundery-links" ng-if="boundaryLinks" ng-class="{ disabled : pagination.current == 1 }">
                <a href="" ng-click="setCurrent(1)">&laquo;</a>
            </li>
              <li class="previous "ng-if="directionLinks" ng-class="{ disabled : pagination.current == 1 }"><a href="javascript:void(0)" ng-click="setCurrent(pagination.current - 1)" class=" fui-arrow-left"></a>
              </li>
              
              <li ng-repeat="pageNumber in pages track by tracker(pageNumber, $index)"  ng-class="{ active : pagination.current == pageNumber, disabled : pageNumber == '...' }"><a href="javascript:void(0)" ng-click="setCurrent(pageNumber)">{{ pageNumber }}</a>
              </li>
              
              <li class="next" ng-if="directionLinks" ng-class="{ disabled : pagination.current == pagination.last }"><a href="javascript:void(0)" class="fui-arrow-right" ng-click="setCurrent(pagination.current + 1)"></a>
              </li>
              <li ng-if="boundaryLinks" class="boundery-links" ng-class="{ disabled : pagination.current == pagination.last }">
                <a href="" ng-click="setCurrent(pagination.last)">&raquo;</a>
            </li>
            </ul>
          </div>